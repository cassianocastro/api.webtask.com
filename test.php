<?php

const API_URL = "http://www.api.webtask.com";

/**
 * @test
 */
function canPostEmployeeContract(): void
{
    $json = json_encode(
        [
            "register"  => "007",
            "office"    => "Mecanico",
            "admission" => "2023-01-10",
            "wage"      => 2400.30
        ],
        JSON_PRESERVE_ZERO_FRACTION
    );

    $options = [
        "http" => [
            "method"  => "POST",
            "header"  => [
                "Content-type: application/json;charset=utf-8"
            ],
            "content" => $json
        ]
    ];

    $context = stream_context_create($options);
    $content = file_get_contents(API_URL . "/employees/2/contract", false, $context);

    print $content;
}

/**
 * @test
 */
function canPutEmployeeContract(): void
{
    $json = json_encode(
        [
            "register"  => "001",
            "office"    => "Encarregado",
            "admission" => "2021-07-05",
            "wage"      => 4500.90
        ],
        JSON_PRESERVE_ZERO_FRACTION
    );

    $options = [
        "http" => [
            "method"  => "PUT",
            "header"  => [
                "Content-type: application/json;charset=utf-8"
            ],
            "content" => $json
        ]
    ];

    $context = stream_context_create($options);
    $content = file_get_contents(API_URL . "/employees/12345678900/contract", false, $context);

    print $content;
}

/**
 * @test
 */
function canGetEmployeeContract(): void
{
    $options = [
        "http" => [
            "method"  => "GET",
            "header"  => [
                "Accept: application/json;charset=utf-8"
            ]
        ]
    ];

    $context = stream_context_create($options);
    $content = file_get_contents(API_URL . "/employees/12345678900/contract", false, $context);

    print $content;
}

canPostEmployeeContract();