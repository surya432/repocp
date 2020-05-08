    <span class="close cursor" data-dismiss="modal" onclick="closeModal()">&times;</span>
    <div class="modal-contentdokumentasi">
        <div class="caption-container">
            <h3 id="caption">{{$b['title']}}</h3>
            <p class="font-produk-deskripsi">{{$b['deskripsi']}}</p>

        </div>
        @if(count($b['imagesMedia'])< 1) <div class="row wrap-small-img">
            <div class="column img-demo">
                <img class="demo cursor" src="{{url('/images/'.$b['images'])}}" onclick="currentSlide(1)" alt="{{$b['title']}}">
            </div>
    </div>
    <div class="mySlides ">
        <img src="{{url('/images/'.$b['images']) }}" alt="{{$b['title']}}" />
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    @else
    <div class="row wrap-small-img">
        @for($i=0;$i< count($b['imagesMedia']);$i++) 
            @if($b['imagesMedia'][$i]['mime']!="video/mp4")
         
            <div class="column img-demo">
                <img class="demo cursor" src="{{url('/images/'.$b['imagesMedia'][$i]['path']) }}" onclick="currentSlide({{$i+1}})" alt="{{$b['title']}}">
            </div>
        
            @endif 

        @endfor
    </div>

        @for($i=0;$i< count($b['imagesMedia']);$i++) 
            @if($b['imagesMedia'][$i]['mime']!='video/mp4')

            <div class="mySlides ">
                <img src="{{url('/images/'.$b['imagesMedia'][$i]['path']) }}" alt="{{$b['title']}}" />
            </div>
            @else
            <div id="apicodes-player{{$b['imagesMedia'][$i]['id']}}"></div>
                <div class="column img-demo">
                    <div class="demo cursor" ></div>
                    <script type="text/javascript">
                        var player = jwplayer("apicodes-player{{$b['imagesMedia'][$i]['id']}}").setup({
                            sources: [{
                                "file": "{{url('/')}}/images/{{$b['imagesMedia'][$i]['path']}}",
                                "type": "video\/mp4",
                                "label": "default",
                                "default": "true"
                            }],
                            // aspectratio: "16:9",
                            // startparam: "start",
                            width:"100%",
                            primary: "html5",
                            autostart: false,
                            preload: "auto",
                            captions: {
                                color: "#f3f368",
                                fontSize: 16,
                                backgroundOpacity: 0,
                                fontfamily: "Helvetica",
                                edgeStyle: "raised"
                            },
                        });
                        player.on("setupError", function() {
                            swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
                        });
                        player.on("error", function() {
                            swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
                        });
                    </script>
                </div>
            @endif 
        @endfor
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    @endif

<div class="caption-container">
    <p class="font-produk-deskripsi">{!! $b['content'] !!}</p>
    <ul class="list-inline m-b-40">
        <li>Date : {{$b['tanggal']}}</li>
    </ul>
    <button class="btn btn-close-project" data-dismiss="modal" onclick="closeModal()" type="button">
        <i class="fas fa-times"></i>Close</button>
</div>