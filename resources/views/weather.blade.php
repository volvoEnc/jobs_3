<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>JOB_3</title>
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Погода в Москве
            </div>
            <div class="card-body text-center">
                <button class="btn btn-primary btn-start col-4" onclick="start()">Старт</button>
                <form class="form-weather d-none" action="/weather" method="POST">
                    <div class="form-group text-left">
                        <label for="nameTextInp">Имя</label>
                        <input name="name" type="text" id="nameTextInp" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="emailTextInp">Почта</label>
                        <input name="email" type="email" id="emailTextInp" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Узнать погоду</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>

<script>
    let form = document.querySelector(".form-weather");
    let btn_start = document.querySelector(".btn-start");
    function start() {
        form.classList.remove('d-none');
        btn_start.classList.add('d-none');
    }
    @if(!$errors->isEmpty())
        start();
    @endif
</script>
