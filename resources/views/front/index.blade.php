<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Menü - Ajax + URL Değiştirme</title>
    <style>
        .menu {
            float: left;
            width: 20%;
        }

        .content {
            float: left;
            width: 70%;
            margin-left: 5%;
        }
    </style>
</head>

<body>

    <div class="menu">
        <h3>Menü</h3>
        <li>
            <a href="/" data-slug="ana-sayfa" class="ajaxLink">
                Ana Sayfa
            </a>
        </li>
        @foreach ($menus as $menu)
            <strong>
                <!-- Üst menünün kendi slug’ı da varsa -->
                @if ($menu->slug !== 'ana-sayfa')
                    <a href="/{{ $menu->slug }}" class="ajaxLink" data-slug="{{ $menu->slug }}">
                        {{ $menu->title }}
                    </a>
                @endif

            </strong>
            @if ($menu->children->count() > 0)
                <ul>
                    @foreach ($menu->children as $child)
                        <li>
                            <a href="/{{ $child->slug }}" class="ajaxLink" data-slug="{{ $child->slug }}">
                                {{ $child->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <hr>
        @endforeach
        <ul>
            <li> <a href="{{ route('login') }}">Login</a></li>
        </ul>
    </div>


    <div class="content">
        <div id="content-area">
            @if ($page->content)
                {!! $page->content !!}
            @else
                <h2>Hoş Geldiniz</h2>
                <p>Burada içerikler Ajax ile yüklenecek.</p>
            @endif
        </div>

        <div id="iletisim-area">

        </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('.ajaxLink');
            links.forEach(link => {
                link.addEventListener('click', async function(e) {
                    e.preventDefault();
                    const slug = this.dataset.slug;

                    // eğer slug "ana-sayfa" ise pushState ile tarayıcıda "/" göster
                    // yoksa "/slug"
                    if (slug === 'ana-sayfa') {
                        history.pushState({
                            slug: slug
                        }, '', '/');
                    } else {
                        history.pushState({
                            slug: slug
                        }, '', '/' + slug);
                    }

                    // AJAX isteği
                    const res = await fetch('/get-content/' + slug);
                    const data = await res.json();
                    document.getElementById('content-area').innerHTML = data.content;

                    if (slug === 'iletisim') {
                        document.getElementById('iletisim-area').innerHTML = data.settings;
                    } else {
                        document.getElementById('iletisim-area').innerHTML = '';
                    }

                });
            });

            // "geri" tuşu popstate:
            window.addEventListener('popstate', async (e) => {
                if (e.state && e.state.slug) {
                    const slug = e.state.slug;
                    const res = await fetch('/get-content/' + slug);
                    const data = await res.json();
                    document.getElementById('content-area').innerHTML = data.content;
                    if (slug === 'iletisim') {
                        document.getElementById('iletisim-area').innerHTML = data.settings;
                    } else {
                        document.getElementById('iletisim-area').innerHTML = '';
                    }
                } else {
                    // state yoksa anasayfa döndür
                    const res = await fetch('/get-content/ana-sayfa');
                    const data = await res.json();
                    document.getElementById('content-area').innerHTML = data.content;
                }
            });
        });
    </script>

</body>

</html>
