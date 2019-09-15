@extends('layouts.head')




@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('lyrics_images/'.$post->Album_art)}} );">
        <div class="bradcumbContent">
            <img src="{{ asset('lyrics_images/'.$post->Album_art)}}" alt="">
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-0-100" id="app" >

            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <p>Artist : {{$post->artist}}</p>
                        <h2>Song-title: {{$post->title}}</h2>
                    </div>
                </div>
<div class="container" style="text-align: center; margin-bottom: 20px;">
                @guest
                    <p>Register or login to propose edit</p>
                @else
                    <edit-lyrics lyric=" {!! $post->content !!}" lyric_id="{{$post->id}}"></edit-lyrics>
                @endguest
            </div>
            </div>





        <!--   post content div  with  english translation    -->
  <div class="container">
            <div class="row" >
                    <!-- Contact Form Area -->
                    <div class="col-md-7" style="font-size: 15px;"  >
                        {!! $post->content !!}
                    </div>

                    <div class="col-md-3">
                        <h1> Translation in english</h1>
                        <p>Lorem ipsum dolor sit amet,
                            <br/>consectetur adipisicing elit.
                            <br/>
                            Ab adipisci asperiores commodi deserunt esse expedita,
                            <br/>
                            facere fugiat, illum iusto magni nobis praesentium quo <br/>
                            reiciendis sequi soluta temporibus vel veniam voluptates.</p>
                    </div>


                    <div  class="col-md-6">
                        @guest
                            <p>you can only comment if you are a user</p>
                        @else
                        <comment lyric_id="{{$post->id}}" ></comment>
                        @endguest


                        <div>
                            <div class="comment" style="padding:20px;background: gray;">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, consectetur earum. A consectetur culpa dolore earum fugit iste nobis numquam odit,
              officiis quaerat quibusdam repellat suscipit, temporibus tenetur unde velit?</p>
                            </div>
                        </div>
                    </div>



            </div>
  </div>

    </section>



@endsection


