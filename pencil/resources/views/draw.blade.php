
@extends('html')

@section('meta')
  @include('meta', [
    'title' => 'お絵かきのツイート',
    'description' => 'お絵かきをツイートします。',
  ])
@endsection

@section('content')
  <div class="article article-draw">
    <h2>お絵かきのツイート</h2>
    <button id="drawing-button">ウィンドウ表示</button>
    <div id="drawing-window">
      <div class="drawing-dialog">
        <canvas id="drawing-canvas"></canvas>
      </div>
    </div>
  </div>
@endsection