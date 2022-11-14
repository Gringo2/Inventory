
            <div class="flash-error" style="color:red;">
                <b></b>
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
