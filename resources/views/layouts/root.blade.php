<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" /> -->
  <!-- <link rel="icon" type="image/png" href="./assets/img/favicon.png" /> -->
  <title>@yield('title')</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <!-- Main Styling -->
  <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmDelete(index) {
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3C3D37',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('deleteForm' + index).submit();
        }
      });
    }
  </script>

  @vite('resources/css/app.css')
  @stack('styles')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
  @yield('content')

  @stack('scripts')
  @if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session("success") }}',
      showConfirmButton: false,
      timer: 1500
    });
  </script>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}" async></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js')}}" async></script>
  <script>
    // Function to show popup
    function showPopup(popupId) {
      document.getElementById(popupId).classList.remove('hidden');
      document.getElementById(popupId).classList.add('flex');
    }

    // Function to hide popup
    function hidePopup(popupId) {
      document.getElementById(popupId).classList.remove('flex');
      document.getElementById(popupId).classList.add('hidden');
    }

    // Event listeners for buttons
    document.getElementById('profileButton').addEventListener('click', function() {
      var profileMenu = document.getElementById('profileMenu');
      profileMenu.classList.toggle('hidden');
    });

    function toggleFaq(popupId) {
      var contentDiv = document.getElementById(popupId);
      // var textElement = document.getElementById('text' + popupId.replace('content', ''));

      // Toggle maxHeight for the accordion effect
      if (contentDiv.style.maxHeight) {
        contentDiv.style.maxHeight = null;
      } else {
        contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
      }

    }
  </script>
</body>

</html>