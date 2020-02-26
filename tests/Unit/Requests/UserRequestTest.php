<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\UserRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;

class UserRequestTest extends TestCase
{
    /**
     * バリデーションテスト
     *
     * @param 項目名
     * @param 値
     * @param 期待値
     *
     * @dataProvider dataprovider
     * @dataProvider dataprovider2
     */
    public function testBasicTest(array $item, bool $expect): void
    {
        $request  = new UserRequest();
        $rules    = $request->rules();
        $dataList = $item;

        $validator = Validator::make($dataList, $rules);
        $result    = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    /**
     * データプロバイダ
     *
     * @return データプロバイダ
     */
    public function dataprovider(): array
    {
        return [
            'expect' => [
                [
                    'userId'   => 'izumi',
                    'username' => 'ユーザ名',
                ],
                true
            ],
            'userId is null' => [
                [
                    'userId'   => null,
                    'username' => 'ユーザ名',
                ],
                false
            ],
            'userId is brank' => [
                [
                    'userId'   => '',
                    'username' => 'ユーザ名',
                ],
                false
            ],
            'userId is bran' => [
                [
                    'userId'   => '',
                    'username' => 'ユーザ名',
                ],
                false
            ],
        ];
    }

    /**
     * データプロバイダ
     *
     * @return データプロバイダ
     */
    public function dataprovider2(): array
    {
        return [
            'expect2' => [
                [
                    'userId'   => 'izumi',
                    'username' => 'ユーザ名',
                ],
                true
            ],
            'userId is null2' => [
                [
                    'userId'   => null,
                    'username' => 'ユーザ名',
                ],
                false
            ],
            'userId is brank2' => [
                [
                    'userId'   => '',
                    'username' => 'ユーザ名',
                ],
                false
            ],
            'userId is bran2' => [
                [
                    'userId'   => '',
                    'username' => 'ユーザ名',
                ],
                false
            ],
        ];
    }
}
