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
     * @param データ
     * @param 期待値
     *
     * @dataProvider provideData
     */
    public function testBasicTest(array $data, bool $expect): void
    {
        $request  = new UserRequest();
        $rules    = $request->rules();

        $validator = Validator::make($data, $rules);
        $result    = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    /**
     * データプロバイダ
     *
     * @return データプロバイダ
     */
    public function provideData(): array
    {
        return [
            'validation name normal'          => [$this->fetchBaseData(), true],
            'validation name required: null'  => [$this->fetchCustomData('name', null), false],
            'validation name required: blank' => [$this->fetchCustomData('name', ''), false],
        ];
    }

    /**
     * テストの元データを取得する
     *
     * @return テストの元データ
     */
    private function fetchBaseData(): array
    {
        return [
            'name' => 'GeM01odcu5',
        ];
    }

    /**
     * テストの元データを取得する
     *
     * @param  項目
     * @param  カスタム値
     * @return テストの元データ
     */
    private function fetchCustomData($column, $customValue): array
    {
        $baseData          = $this->fetchBaseData();
        $baseData[$column] = $customValue;
        return $baseData;
    }
}
