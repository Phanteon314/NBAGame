<div class="footer" style="border-top: #AAFF00 2px solid; background-color:#0d0d0d; margin-top: 150px;">
    <div class="row">
        <ul>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </ul>
    </div>

    <div class="row">
        <ul>
            @if (auth()->check())
                <li><a href="{{url('/contacto')}}">Contactanos</a></li>
            @else
                <li><a href="{{url('/login')}}">Contactanos</a></li>
            @endif
            <li><a href="#">Terminos y condiciones</a></li>
            <li><a href="{{url('index')}}">Sobre nosotros</a></li>
        </ul>
    </div>

    <div class="row d-flex justify-content-center">
        NBAGame Copyright © 2023 NBAGame - All rights reserved || Designed By: Luis Sanchez
    </div>
</div>