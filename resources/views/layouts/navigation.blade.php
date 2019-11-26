<div>
        <div class="container text-center rounded m-4 p-4 " id="navigation">
                <div class="row">
                  <div class="col-sm">
                  <a href="/home">{{__('text.Home')}}</a>
                  </div>
                  <div class="col-sm">
                    <!-- 不純寫ArticleController@index的好處是可以輕易go definition-->
                    <a href="{{action([\App\Http\Controllers\ArticleController::class, 'index'])}}">Article</a>
                  </div>
                  <div class="col-sm">
                        <a href="/tomato">API</a>
                  </div>
                  <div class="col-sm">
                        <a href="/todo">To Do List</a>
                  </div>
                  <div class="col-sm">
                        <a href="/clock">Clock</a>
                  </div>
                  <div class="col-sm">
                        <a href="/about">Ablout Me</a>
                  </div>
                </div>
        </div>

  </div>
