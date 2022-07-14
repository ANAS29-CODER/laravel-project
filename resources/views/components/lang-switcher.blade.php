


   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        
          <i class="fa-globe" :before></i>

        </a>
        <div class="dropdown-menu dropdown-menu-right">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>

    @endforeach
        </div>

   </li>


