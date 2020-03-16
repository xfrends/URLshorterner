<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>URLshorterner</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
        <style type="text/css">
            .full-width {
                display: block;
                width: 100%;
                cursor: pointer;
                text-align: center;
            }
        </style>
    </head>
    <body>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)      
                <strong>Error! </strong>{{ $error }}
            @endforeach
        </div>
    @endif
    @if(session()->get('success'))
      <div class="alert alert-success">
        <strong>Success! </strong>{{ session()->get('success') }}  
      </div>
    @endif
    @if(session()->get('error'))
      <div class="alert alert-danger">
        <strong>Error! </strong>{{ session()->get('error') }}  
      </div>
    @endif
    <div class="container mt-5">
        <a href="{{url('/')}}"><h2>URL shorterner</h2></a>
        <form action="{{url('short')}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-md-10 col-sm-12 mt-2">
                    <input type="text" class="form-control" placeholder="Shorten you url" name="url" required>                
                </div>
                <div class="col-md-2 col-sm-12 mt-2">
                    <button type="submit" class="btn btn-primary full-width">Shorten</button>                    
                </div>
            </div>
        </form>
        @if(isset($dataurl))
        <div class="form-group row">
            <div class="d-none d-md-block col-md-6 col-sm-12 mt-2">
                <label for="old_url">Full URL</label>
            </div>
            <div class="d-none d-md-block col-md-4 col-sm-12 mt-2">
                <label for="new_url">New URL</label>
            </div>
            <div class="col-md-6 col-sm-12 mt-2">
                <input type="text" class="form-control" value="{{$dataurl->full_url}}">                
            </div>
            <div class="input-group col-md-6 col-sm-12 mt-2">
                <input type="text" class="form-control" id="new_url" value="{{url('').'/'.$dataurl->short_url}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
                </div>
            </div>
        </div>
        @endif
    </div>
    <script type="text/javascript">
        function copyToClipboard() {
            var new_url = document.getElementById("new_url");
            new_url.select();
            document.execCommand("copy");
        }
    </script>
</html>
