    <span class="close cursor" data-dismiss="modal" onclick="closeModal()">&times;</span>
    <div class="modal-contentdokumentasi">
        <div class="caption-container">
            <h3 id="caption">{{$b['title']}}</h3>
            <p class="font-produk-deskripsi">{{$b['deskripsi']}}</p>

        </div>
        @if(is_null($b['imagesMedia'])) <div class="row wrap-small-img">
            <div class="column img-demo">
                <img class="demo cursor" src="{{url('/images/'.$b['images'])}}" onclick="currentSlide(1)"
                    alt="{{$b['title']}}">
            </div>
        </div>
        <div class="mySlides ">
            <img src="{{url('/images/'.$b['images']) }}" alt="{{$b['title']}}" />
        </div>
        @else <div class="row wrap-small-img">
            @for($i=0;$i< count($b['imagesMedia']);$i++) <div class="column img-demo">
                <img class="demo cursor" src="{{url('/images/'.$b['imagesMedia'][$i]['path']) }}"
                    onclick="currentSlide({{$i+1}})" alt="{{$b['title']}}">
            </div>
            @endfor
    </div>

    @for($i=0;$i< count($b['imagesMedia']);$i++) <div class="mySlides ">
        <img src="{{url('/images/'.$b['imagesMedia'][$i]['path']) }}" alt="{{$b['title']}}" />
        </div>
        @endfor
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        @endif

        <div class="caption-container">

            <p class="font-produk-deskripsi">{{$b['content']}}</p>
            <ul class="list-inline m-b-40">
                <li>Date : {{$b['tanggal']}}</li>
            </ul>
            <button class="btn btn-close-project" data-dismiss="modal" onclick="closeModal()" type="button">
                <i class="fas fa-times"></i>Close</button>
        </div>