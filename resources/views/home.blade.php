@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{Auth::id()}}
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--    <chat-component></chat-component>-->
@endsection
@section('js')
    <script>
        // "fix" to prevent pusher error on reload
        window.Pusher = undefined;
    </script>
    <script src="/js/echo.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <?php $id = 1;?>
    <script>
        var i = 0;
        let id='{{Auth::id()}}';
        Pusher.logToConsole = true;

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '6204921d95f764016ce1',
            cluster: 'ap2',
            encrypted: true,
            logToConsole: true,
        });

        Echo.private('user.'+id)
            .listen('ChatEvent', (e) => {
                if (Object.keys(e).length !== 0)
                {
                    console.log(e.user)
                }
            });

    </script>
{{--    <script>--}}
{{--        window.Vue = require('vue');--}}
{{--        const app = new Vue({--}}
{{--            el: '#app',--}}
{{--            data: {--}}
{{--                comments: {},--}}
{{--                commentBox: '',--}}
{{--                --}}{{--post: {!! $post->toJson() !!},--}}
{{--                --}}{{--user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}--}}
{{--            },--}}
{{--            mounted() {--}}
{{--                // this.getComments();--}}
{{--                // this.listen();--}}
{{--            },--}}
{{--            methods: {--}}
{{--                getComments() {--}}
{{--                    axios.get('/api/posts/'+this.post.id+'/comments')--}}
{{--                        .then((response) => {--}}
{{--                            this.comments = response.data--}}
{{--                        })--}}
{{--                        .catch(function (error) {--}}
{{--                            console.log(error);--}}
{{--                        });--}}
{{--                },--}}
{{--                postComment() {--}}
{{--                    axios.post('/api/posts/'+this.post.id+'/comment', {--}}
{{--                        api_token: this.user.api_token,--}}
{{--                        body: this.commentBox--}}
{{--                    })--}}
{{--                        .then((response) => {--}}
{{--                            this.comments.unshift(response.data);--}}
{{--                            this.commentBox = '';--}}
{{--                        })--}}
{{--                        .catch((error) => {--}}
{{--                            console.log(error);--}}
{{--                        })--}}
{{--                },--}}
{{--                listen() {--}}
{{--                    Echo.private('post.'+this.post.id)--}}
{{--                        .listen('NewComment', (comment) => {--}}
{{--                            this.comments.unshift(comment);--}}
{{--                        })--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
@endsection

