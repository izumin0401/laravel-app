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
     */
    public function testBasicTest(string $item, string $data, bool $expect): void
    {
        $request  = new UserRequest();
        $rules    = $request->rules();
        $dataList = [$item => $data];

        $validator = Validator::make($dataList, $rules);
        $result    = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    /**
     * データプロバイダ
     *
     * @return データプロバイダ
     *
     * @dataProvider dataprovider
     */
    public function dataprovider(): array
    {
        return [
            'expect'   => ['username', 'ユーザ名', true],
            'required' => ['username', null, false],
            'required' => ['username', '', false],
            'max'      => ['username', str_repeat('a', 101), false],
            'max'      => ['username', str_repeat('a', 100), true],
        ];
    }
}
