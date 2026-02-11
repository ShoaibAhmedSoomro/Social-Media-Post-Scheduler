<?php

namespace Modules\AppAIContents\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use AI;

class AppAIContentsController extends Controller
{

    public function __construct()
    {
        $this->template_table = "ai_templates";
        $this->category_table = "ai_categories";
    }

    public function index()
    {
        return view('appaicontents::index', []);
    }

    public function categories(Request $request){
        $categories = DB::table("ai_categories")->where("status", 1)->get();

        ms([
            "status" => 1,
            "data" => view(module("key").'::categories',[
                "categories" => $categories,
            ])->render()
        ]);       
    }

    public function templates(Request $request){
        $category = DB::table("ai_categories")->where(["id_secure" => $request->id, "status" => 1])->first();

        if(empty($category)){
            ms([
                "status" => 0,
                "message" => __("Category does not exist")
            ]);     
        }

        $templates = DB::table($this->template_table)->where(["cate_id" => $category->id, "status" => 1])->get();

        ms([
            "status" => 1,
            "data" => view(module("key").'::templates',[
                "category" => $category,
                "templates" => $templates,
            ])->render()
        ]);       
    }

    public function process(Request $request, $page = "default") {
        $ai_options = $request->ai_options ?? [];

        $prompt = $request->prompt ?? '';
        $language = $ai_options['language'] ?? 'en-US';
        $maxLength = isset($ai_options['max_length']) ? (int)$ai_options['max_length'] : 100;
        $tone_of_voice = $ai_options['tone_of_voice'] ?? 'Friendly';
        $creativity = $ai_options['creativity'] ?? 0.5;
        $hashtags = $ai_options['hashtags'] ?? 0;
        $maxResult = isset($ai_options['number_result']) ? (int)$ai_options['number_result'] : 3;

        if($maxResult < 1 || $maxResult > 10){
            $maxResult = 3;
        }

        if(empty($prompt)){
            ms([
                "status" => "error",
                "message" => __("Please enter your prompt")
            ]);
        }

        if($hashtags){
            $content = "Create a paragraph about the content '$prompt' including $hashtags hashtags at the end of each paragraph with a maximum of $maxLength characters. Creativity is $creativity between 0 and 1. Use the $language language. Tone of voice must be $tone_of_voice.";
        }else{
            $content = "Create a paragraph about the content '$prompt' with a maximum of $maxLength characters. Creativity is $creativity between 0 and 1. Use the $language language. Tone of voice must be $tone_of_voice.";
        }

        $result = AI::process($content, $maxResult);

        switch ($page) {
            case 'popup':
                $view = 'popup_result';
                break;

            default:
                $view = 'result';
                break;
        }

        ms([
            "status" => 1,
            "data" => view(module("key").'::'.$view,[
                "result" => $result['data']??[],
            ])->render()
        ]);
    }

    public function popupAIContent(){
        ms([
            "status" => 1,
            "data" => view(module("key").'::popup',[
                
            ])->render()
        ]);
    }

    public function createContent(Request $request){
        try {
            $content = $request->content;
            if($content == ""){
                ms([
                    "status" => "error",
                    "message" => __("Please enter your prompt")
                ]);
            }

            $result = AI::process($content, 1);

            ms([
                "status" => 1,
                "data" => $result['data'][0] ?? ''
            ]);
        } catch (\Exception $e) {
            ms([
                "status" => 0,
                "message" => $e->getMessage()
            ]);
        }
    }
}