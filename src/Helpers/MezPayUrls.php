<?php

namespace MezPay\Helpers;
use Illuminate\Support\Facades\Crypt;

class MezPayUrls
{
    public static function getRegisterUrl()
    {
        return Crypt::decryptString('eyJpdiI6InhWZEUrTEpnQlJtVEtHcDVvT2RHRHc9PSIsInZhbHVlIjoiMzVld2wvTXRvcWYyUWJXaVNycTIrSGhyWjBpelNQRlppS2VGUEJIYlJCNUFVekZteW5vOURoV2JHS1paTWdRV3hYWmI3bUNScGRIeW01a09CT0NmY2c9PSIsIm1hYyI6IjNjYjM3YzE4NGVhZjg1ZTY1MDc5NTkyNWZhNzhjOWRhN2VkYzExYmNjMDQwODJhZWE1NWZjMDRmMmU5OTg4NDIiLCJ0YWciOiIifQ==');
    }

    public static function getOrderStatusUrl()
    {
        return  Crypt::decryptString('eyJpdiI6ImJLTkkxTmdJK2pkck5zUXJva0V3QVE9PSIsInZhbHVlIjoiRGFSbjQ4QnkxRmU2bUlqb1IxdGhqODV6TWx2T1VlOG9BSDdFSU9pZXdMaVhteC84RGpzU1JOdVlHOEJFbGhRYlQyY2NjN285cTFqOXhrUDRqcERJUlkvRUk0WlJyTUtLYzQ4a3lvVER1Z0U9IiwibWFjIjoiNDRkMjA2MzJiNWUwMDllYzRkNDI5ZWVlOGFiZWUwOGIzNWFmM2FlY2U2MmJiMjZkZWM5ZDRlYTQ2YTM2Mzc2OSIsInRhZyI6IiJ9');
    }

    public static function getStatus()
    {
        return  Crypt::decryptString('eyJpdiI6ImhkUHNRUHVmSklxanJ3OFlQZFJVcmc9PSIsInZhbHVlIjoienJ4NFhZZy9pbnBqVU5yWGpzeUxzcVBXVFdvbUN5NzM3ZUZwck9GQlVqYlV5RXB3L2dtSG04TmFkd0VuQ1A1Y0ZqSzViV1dxZzBwQmhDK2REcDhRemc9PSIsIm1hYyI6IjRjYWY3NDA5ZGQ3NmY2M2RiZDJiNzJkYzllNTBiODQ0Y2YwYjk3MWE2OTY3YzYzY2JlY2YwZmI5ZGFkYTc5MDEiLCJ0YWciOiIifQ==');
    }

    public static function getReversal()
    {
        return  Crypt::decryptString('eyJpdiI6ImpiSjJiek5Eb09qRllSaHpXUzBsVkE9PSIsInZhbHVlIjoiUVQ4Z1VaTWNPMWt5eUwva3VIRmppZWZpcDRuMUJ1Qm9XelVGeGl0ZE9Yc3lSTWovamYzcmpzZ1EvVWVoNWhQMzBSVTdjdm5ISm94aGgxdnVtblVyOXc9PSIsIm1hYyI6IjkzMWIxMGQ1N2FiMDdkY2YwM2Q1YTdiMTcyODJmZTE5MzlkZDNlMjk2Y2NkMzQ3NTE3ODlmMjYzMGZhODdjZjciLCJ0YWciOiIifQ==');
    }

    public static function getRefund()
    {
        return  Crypt::decryptString('eyJpdiI6ImpiSjJiek5Eb09qRllSaHpXUzBsVkE9PSIsInZhbHVlIjoiUVQ4Z1VaTWNPMWt5eUwva3VIRmppZWZpcDRuMUJ1Qm9XelVGeGl0ZE9Yc3lSTWovamYzcmpzZ1EvVWVoNWhQMzBSVTdjdm5ISm94aGgxdnVtblVyOXc9PSIsIm1hYyI6IjkzMWIxMGQ1N2FiMDdkY2YwM2Q1YTdiMTcyODJmZTE5MzlkZDNlMjk2Y2NkMzQ3NTE3ODlmMjYzMGZhODdjZjciLCJ0YWciOiIifQ==');
    }

    public static function get3DSecure()
    {
        return  Crypt::decryptString('eyJpdiI6ImpiSjJiek5Eb09qRllSaHpXUzBsVkE9PSIsInZhbHVlIjoiUVQ4Z1VaTWNPMWt5eUwva3VIRmppZWZpcDRuMUJ1Qm9XelVGeGl0ZE9Yc3lSTWovamYzcmpzZ1EvVWVoNWhQMzBSVTdjdm5ISm94aGgxdnVtblVyOXc9PSIsIm1hYyI6IjkzMWIxMGQ1N2FiMDdkY2YwM2Q1YTdiMTcyODJmZTE5MzlkZDNlMjk2Y2NkMzQ3NTE3ODlmMjYzMGZhODdjZjciLCJ0YWciOiIifQ==');
    }
}

