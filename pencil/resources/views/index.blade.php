@extends('html')
<!-- htmllint spec-char-escape="false" -->
<!-- textlint-disable -->
@section('meta') @include('meta', [ 'description' => 'Twitter に直接投稿できる気軽なお絵かきサービスです。', ]) {{--
画像の上からお絵かきを重ねたり、自分の気持ちをアイコンで添えることもできます。 --}} @endsection
<!-- htmllint spec-char-escape="$previous" -->
<!-- textlint-enable -->

@section('content')
<div class="top container">
    <div>
        <div class="header">
            @php $landscapes = glob(public_path('images/landscapes/*.png')); $landscapeUrl =
            url(str_replace(public_path(), '', $landscapes[array_rand($landscapes)])); $landscapeAlt =
            basename($landscapeUrl, '.png'); $animals = glob(public_path('images/animals/*.png')); $animalUrl =
            url(str_replace(public_path(), '', $animals[array_rand($animals)])); $animalAlt = basename($animalUrl,
            '.png'); @endphp

            <div class="horizon"></div>
            <img class="landscape" src="{{ $landscapeUrl }}" alt="{{ $landscapeAlt }}" />
            <img class="animal" src="{{ $animalUrl }}" alt="{{ $animalAlt }}" />
            <h1>
                <img src="{{ url('images/wing.png') }}" alt="羽根" />
                Hood Pencil
            </h1>
        </div>

        <h2>プライバシーポリシー</h2>
        <p>
            当アプリケーションでは、アクセス解析として「<a href="https://www.google.com/analytics/terms/jp.html"
                >Googleアナリティクス</a
            >」を利用しています。<br />
            また、エラー収集として「<a href="https://sentry.io/">Sentry</a>」を利用しています。<br />
            送信される情報は匿名で収集されており、個人を特定するものではありません。<br />
        </p>

        <h2>Privacy Policy</h2>
        <p>
            This application uses <a href="https://www.google.com/analytics/terms/jp.html">Google Analytics</a>: access
            log service. <br />
            And uses <a href="https://sentry.io/">Sentry</a>: error logging service. <br />
            These sended informations contain no personal information. <br />
        </p>

        <p>↓タッチするとお絵かきウィンドウが開きます。 Tap or click here to draw.</p>

        <canvas id="preview-canvas"></canvas>

        <div id="drawing-window" class="modal-window">
            <div>
                <div id="drawing-dialog">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="drawing-dialog-sidebar">
                                        <button class="palette-button active" data-color="#000000"></button>
                                        <button class="palette-button" data-color="#ffffff"></button>
                                        <button class="palette-button" data-color="#ff0000"></button>
                                        <button class="palette-button" data-color="#00ffff"></button>
                                        <button class="palette-button" data-color="#00ff00"></button>
                                        <button class="palette-button" data-color="#ff00ff"></button>
                                        <button class="palette-button" data-color="#0000ff"></button>
                                        <button class="palette-button" data-color="#ffff00"></button>

                                        <button id="redo-button" class="history-button" disabled>
                                            <img src="{{ url('images/redo.png') }}" alt="やり直し" />
                                        </button>
                                        <button id="undo-button" class="history-button" disabled>
                                            <img src="{{ url('images/undo.png') }}" alt="元に戻す" />
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div id="stick-cursor">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <canvas id="drawing-canvas"></canvas>
                                </td>
                                <td>
                                    <div class="drawing-dialog-sidebar">
                                        <button class="pencil-button" data-brush="light">
                                            <img src="{{ url('images/pencil-light.png') }}" alt="細いペン" />
                                        </button>
                                        <button class="pencil-button active" data-brush="medium">
                                            <img src="{{ url('images/pencil-medium.png') }}" alt="ペン" />
                                        </button>
                                        <button class="pencil-button" data-brush="bold">
                                            <img src="{{ url('images/pencil-bold.png') }}" alt="太いペン" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input id="text-input" placeholder="テキストを入力して埋め込みます。" />
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tone-window" class="modal-window">
                    <div>
                        <div id="tone-dialog">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <button class="tone-button" data-tone="black"><canvas></canvas></button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="verticalBold">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="verticalMedium">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="verticalLight">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="dotBold"><canvas></canvas></button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="slashLight">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="backslashLight">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="tone-button" data-tone="dotMedium"><canvas></canvas></button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="horizontalBold">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="horizontalMedium">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="horizontalLight">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="dotLight"><canvas></canvas></button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="slashBold"><canvas></canvas></button>
                                        </td>
                                        <td>
                                            <button class="tone-button" data-tone="backslashBold">
                                                <canvas></canvas>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
