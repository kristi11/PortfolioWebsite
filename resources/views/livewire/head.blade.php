<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>
        {{ isset($user->seo) && $user->seo->title !== null && $user->seo->title !== '' ? $user->seo->title : env('APP_NAME') }}

    </title>
    <meta name="description" content="{{ isset($user->seo) && $user->seo->description !== null && $user->seo->description !== '' ? $user->seo->description : '' }}
"/>
    <meta name="author" content="{{ env('APP_NAME') }}"/>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"/>
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #2c3e50 0%, #bdc3c7 100%);
        }
    </style>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "name": "{{ isset($user->seo) && $user->seo->title !== null && $user->seo->title !== '' ? $user->seo->title : env('APP_NAME') }}",
          "url": "{{ env('APP_URL') }}",
          "description": "{{ isset($user->seo) && $user->seo->description !== null && $user->seo->description !== '' ? $user->seo->description : '' }}",
          "publisher": {
            "@type": "Person",
            "name": "{{ isset($user->seo) && $user->seo->title !== null && $user->seo->title !== '' ? $user->seo->title : env('APP_NAME') }}",
            "logo": "{{ isset($user->profile_photo_path) && $user->profile_photo_path !== null && $user->profile_photo_path !== '' ? $user->profile_photo_path : '' }}",
            "telephone": "{{ isset($user->phone) && $user->phone !== null && $user->phone !== '' ? $user->phone : '' }}"
          },
          "author": {
            "@type": "Person",
            "name": "{{ isset($user->seo) && $user->seo->title !== null && $user->seo->title !== '' ? $user->seo->title : env('APP_NAME') }}",
            "url": "{{ env('APP_URL') }}",
            "sameAs": [
              "{{ isset($user->linkedin_link) && $user->linkedin_link !== null && $user->linkedin_link !== '' ? $user->linkedin_link : '' }}",
              "{{ isset($user->github_link) && $user->github_link !== null && $user->github_link !== '' ? $user->github_link : '' }}",
              "{{ isset($user->stackoverflow_link) && $user->stackoverflow_link !== null && $user->stackoverflow_link !== '' ? $user->stackoverflow_link : '' }}",
              "{{ isset($user->medium_link) && $user->medium_link !== null && $user->medium_link !== '' ? $user->medium_link : '' }}"
            ]
          },
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "{{ isset($user->city) && $user->city !== null && $user->city !== '' ? $user->city : '' }}",
            "addressRegion": "{{ isset($user->state) && $user->state !== null && $user->state !== '' ? $user->state : '' }}"
          }
        }

    </script>
</head>
