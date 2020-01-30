<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
use Validator;
use Carbon\Carbon;
use Cache;
use Illuminate\Database\Eloquent\Builder; 
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {

        //Cache::flush();
        //captcha不存在 验证码功能
        // $request->validate([
        //     'captcha' => 'required|captcha'
        // ]);
//重写了validator,为了规范返回格式
       $validator = Validator::make($request->all(), [
        'email' => 'required|email'
        ]);
        if ($validator->fails()) {
        return response()->error("邮箱格式不正确", 422);
        }

        if(Cache::has('reset-password-request-limit-' . request()->ip())){
            return response()->error('当前ip('.request()->ip().')已于10分钟内提交过重置密码请求。', 498);
        }
        Cache::put('reset-password-request-limit-' . request()->ip(), true, 10);
        if(Cache::has('reset-password-limit-' . request()->ip())){
            return response()->error('当前ip('.request()->ip().')已于1小时内成功重置密码。', 498);
        }

        $user_check = User::where('email', $request->email)->first();

        if (!$user_check) {        
            return response()->error("该邮箱账户不存在", 404);
        }

        if ($user_check->created_at>Carbon::now()->subDay()){     
            return response()->error("当日注册的用户不能重置密码", 412);
        }

        $email_check = PASSWORDRESET::where('email', $request->email)->first();
    //该邮箱12小时内已发送过重置邮件。请不要重复发送邮件，避免被识别为垃圾邮件。 
        if ($email_check&&$email_check->created_at>Carbon::now()->subHours(12)){
            return response()->error("该邮箱12小时内已发送过重置邮件。请不要重复发送邮件，避免被识别为垃圾邮件。", 410);
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if(Cache::has($request->email)){
            $succ_data=[
                'token'=>Cache::get($request->email)
            ];
        }
        Cache::put('reset-password-limit-' . request()->ip(), true, 60);
        
        return $response == Password::RESET_LINK_SENT
        ? response()->success(($succ_data))
        : response()->error("sent email error", 595);
    }
}
