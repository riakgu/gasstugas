@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/../assets/css/chatbot.css" />
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card " > {{-- style="height: 500px;">--}}
                            <div class="card-header">
                                <div class="media d-flex align-items-center">
                                    <div class="avatar me-3">
                                        <img src="/../assets/images/svg/ChatGPT_logo.svg" alt="" srcset="" />
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="name flex-grow-1">
                                        <h6 class="mb-0">ChatGPT</h6>
                                        <span class="text-xs">Online</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4 bg-grey">
                                <div class="chat-content" id="chat-content">
                                    <template id="chat-right">
                                        <div class="chat">
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p id="chat-message"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <template id="chat-left">
                                        <div class="chat chat-left">
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p id="chat-message"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form id="chatbot">
                                    @csrf
                                    <div class="message-form d-flex flex-direction-column align-items-center">
                                        <div class="d-flex flex-grow-1 ms-0 me-0">
                                            <textarea name="message" class="form-control" placeholder="Type your message.." required rows="3"></textarea>
                                        </div>
                                        <button type="submit" id="submit" class="black ms-3 border-0 bg-0" data-feather="send"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/../assets/js/chatbot.js"></script>
@endsection
