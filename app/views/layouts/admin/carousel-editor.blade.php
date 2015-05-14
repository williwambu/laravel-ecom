    <!DOCTYPE html>
<html>
<head>
    <title>Carousel Editor</title>
    <!-- bootstrap -->
    {{HTML::style('css/bootstrap.min.css')}}

    {{HTML::style('css/jquery.smartmenus.bootstrap.css')}}
    {{HTML::style('css/styles.css')}}

    <!-- font - awesome -->
    {{HTML::style('css/font-awesome.min.css')}}

    <!-- editor css -->
    {{HTML::style('css/editor.css')}}
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4>Image slider Editor.</h4>
        </div>
    </div>
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-md-4">
            <div class="pdf-thumb-box">
                <a href="{{route('delete-image',array('id'=>$slide -> id))}}">
                    <div class="pdf-thumb-box-overlay">
                        <span class="fa-stack fa-3x">
                            <i class="fa fa-remove pdf-thumb-square"></i>
                            <h5 class="admin-caption">{{$slide -> caption }}</h5>
                        </span>
                    </div>
                    {{HTML::image($slide->path,'alt',array('class'=>'img-responsive slide-image'))}}
                </a>

            </div>
            <div class="vertical-social-box"></div>
        </div>
        @endforeach
    </div>
    <div class="row">
       <div class="col-md-4">
           <form method="post" enctype="multipart/form-data" action="{{route('add-image')}}">
               <input type="file" name="image">Carousel Image
               <div class="form-group">
                  <textarea class="form-control" name="caption" placeholder="The text that appears as image slides"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Add an Image to Slider</button>
           </form>
       </div>
    </div>
</div>
<!-- jquery -->
{{HTML::script('js/jquery-1.11.2.min.js')}}
<!-- bootstrap -->
{{HTML::script('js/bootstrap.min.js')}}
<!-- smart menus -->
{{HTML::script('js/jquery.smartmenus.js')}}
{{HTML::script('js/jquery.smartmenus.bootstrap.js')}}
{{HTML::script('js/custom.js')}}
<!-- validation -->
{{HTML::script('js/parsley.min.js')}}
<!-- rich edit -->
{{HTML::script('js/editor.js')}}
<!--equal heights of columns -->
{{HTML::script('js/jquery.matchHeight.js')}}
</body>
</html>