
                <div id="layout-admin-responsive-left-sidebar" class="relative w-full bg-gray-200 text-gray-800 flex items-center justify-between z-50 shadow">
                    <!-- responsive logo ::: add md:hidden class to hidden in desktop screen -->

                    <div class="flex justify-between w-80">
                        <a href="{{ route('home', app()->getLocale()) }}" class="block p-4">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 40 40" version="1.1">
                            <defs>
                            <filter id="alpha" filterUnits="objectBoundingBox" x="0%" y="0%" width="100%" height="100%">
                            <feColorMatrix type="matrix" in="SourceGraphic" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/>
                            </filter>
                            <mask id="mask0">
                            <g filter="url(#alpha)">
                            <rect x="0" y="0" width="40" height="40" style="fill:rgb(0%,0%,0%);fill-opacity:0.25098;stroke:none;"/>
                            </g>
                            </mask>
                            <clipPath id="clip1">
                            <rect x="0" y="0" width="40" height="40"/>
                            </clipPath>
                            <g id="surface5" clip-path="url(#clip1)">
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 36.164062 40 L 3.835938 40 C 1.71875 40 0 38.28125 0 36.164062 L 0 3.835938 C 0 1.71875 1.71875 0 3.835938 0 L 36.164062 0 C 38.28125 0 40 1.71875 40 3.835938 L 40 36.164062 C 40 38.28125 38.28125 40 36.164062 40 Z M 36.164062 40 "/>
                            </g>
                            </defs>
                            <g id="surface1">
                            <use xlink:href="#surface5" mask="url(#mask0)"/>
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,21.960784%,46.27451%);fill-opacity:1;" d="M 21.453125 0.320312 C 21.625 0.445312 21.835938 0.414062 22.023438 0.445312 C 23.226562 0.617188 24.382812 0.953125 25.492188 1.445312 C 26.640625 1.945312 27.6875 2.609375 28.65625 3.398438 C 29.257812 3.890625 29.804688 4.4375 30.3125 5.03125 C 30.992188 5.828125 31.578125 6.6875 32.0625 7.609375 C 32.476562 8.40625 32.8125 9.234375 33.0625 10.09375 C 33.25 10.734375 33.390625 11.375 33.476562 12.03125 C 33.539062 12.515625 33.617188 13 33.585938 13.492188 C 33.570312 13.78125 33.59375 14.070312 33.59375 14.367188 C 33.585938 15.03125 33.5 15.6875 33.382812 16.34375 C 33.242188 17.15625 33.015625 17.945312 32.726562 18.71875 C 32.4375 19.476562 32.078125 20.203125 31.671875 20.90625 C 31.03125 22.015625 30.398438 23.132812 29.765625 24.242188 C 29.046875 25.5 28.335938 26.757812 27.617188 28.015625 C 27.148438 28.828125 26.679688 29.648438 26.210938 30.460938 C 25.632812 31.460938 25.054688 32.46875 24.476562 33.46875 C 23.820312 34.609375 23.15625 35.75 22.5 36.890625 C 22.09375 37.59375 21.71875 38.3125 21.289062 39 C 20.679688 39.96875 19.21875 39.882812 18.679688 38.914062 C 17.953125 37.601562 17.1875 36.3125 16.445312 35.015625 C 15.632812 33.609375 14.820312 32.210938 14.015625 30.804688 C 13.367188 29.671875 12.71875 28.546875 12.070312 27.414062 C 11.273438 26.015625 10.476562 24.609375 9.671875 23.210938 C 9.046875 22.125 8.40625 21.054688 7.835938 19.9375 C 7.203125 18.695312 6.796875 17.382812 6.578125 16.015625 C 6.445312 15.171875 6.382812 14.3125 6.414062 13.460938 C 6.460938 12.34375 6.625 11.242188 6.929688 10.164062 C 7.476562 8.265625 8.390625 6.570312 9.664062 5.0625 C 10.898438 3.609375 12.382812 2.484375 14.085938 1.648438 C 15.273438 1.070312 16.523438 0.695312 17.820312 0.460938 C 18.007812 0.429688 18.195312 0.414062 18.382812 0.398438 C 18.4375 0.390625 18.5 0.398438 18.523438 0.328125 C 19.5 0.320312 20.476562 0.320312 21.453125 0.320312 Z M 13.960938 15.015625 C 13.914062 18.351562 16.679688 20.96875 19.757812 21.070312 C 23.351562 21.1875 25.953125 18.351562 26.070312 15.273438 C 26.203125 11.703125 23.320312 8.859375 19.820312 8.945312 C 16.648438 9.023438 13.898438 11.6875 13.960938 15.015625 Z M 13.960938 15.015625 "/>
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(97.647059%,97.647059%,97.647059%);fill-opacity:1;" d="M 9.015625 14.140625 C 8.914062 8.101562 13.898438 3.273438 19.65625 3.125 C 26.015625 2.960938 31.25 8.132812 31.007812 14.609375 C 30.796875 20.203125 26.070312 25.351562 19.539062 25.132812 C 13.953125 24.945312 8.9375 20.203125 9.015625 14.140625 Z M 9.015625 14.140625 "/>
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,21.960784%,46.27451%);fill-opacity:1;" d="M 10.3125 14.140625 C 10.21875 8.8125 14.625 4.546875 19.703125 4.414062 C 25.3125 4.265625 29.9375 8.835938 29.71875 14.554688 C 29.53125 19.492188 25.359375 24.039062 19.59375 23.84375 C 14.664062 23.679688 10.234375 19.492188 10.3125 14.140625 Z M 10.3125 14.140625 "/>
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0.784314%,17.254902%,29.803922%);fill-opacity:1;" d="M 13.085938 13.804688 C 13.414062 13.679688 13.59375 13.382812 13.84375 13.15625 C 14.070312 12.945312 14.046875 12.710938 13.796875 12.539062 C 13.648438 12.4375 13.421875 12.414062 13.398438 12.179688 C 13.414062 12.164062 13.421875 12.140625 13.4375 12.125 C 13.835938 11.835938 13.90625 11.703125 13.726562 11.257812 C 13.640625 11.046875 13.5625 10.828125 13.546875 10.609375 C 13.53125 10.414062 13.640625 10.203125 13.5 10.007812 C 13.671875 9.890625 13.828125 9.78125 13.976562 9.648438 C 14.195312 9.4375 14.507812 9.429688 14.804688 9.5625 C 14.960938 9.632812 15.109375 9.71875 15.265625 9.757812 C 15.71875 9.875 16.148438 9.875 16.492188 9.5 C 16.523438 9.460938 16.59375 9.421875 16.625 9.429688 C 16.984375 9.523438 17.367188 9.476562 17.710938 9.742188 C 18.015625 9.976562 18.351562 10.304688 18.773438 10.203125 C 19.015625 10.140625 19.195312 10.078125 19.398438 10.25 C 19.429688 10.273438 19.484375 10.289062 19.5 10.320312 C 19.648438 10.765625 20.054688 10.75 20.398438 10.835938 C 20.539062 10.875 20.6875 10.851562 20.796875 10.71875 C 20.945312 10.539062 21.148438 10.523438 21.335938 10.601562 C 21.539062 10.6875 21.601562 10.84375 21.59375 11.101562 C 21.585938 11.578125 21.757812 12.023438 22.140625 12.34375 C 22.289062 12.46875 22.4375 12.421875 22.578125 12.367188 C 23.023438 12.195312 23.453125 12.140625 23.921875 12.320312 C 24.101562 12.390625 24.25 12.125 24.46875 12.0625 C 24.429688 12.296875 24.65625 12.25 24.773438 12.34375 C 24.765625 12.546875 24.554688 12.601562 24.476562 12.765625 C 24.382812 12.960938 24.179688 12.757812 24.023438 12.78125 C 23.59375 12.851562 23.1875 12.640625 22.742188 12.695312 C 22.734375 12.734375 22.726562 12.789062 22.71875 12.851562 C 22.648438 13.328125 22.6875 13.3125 23.140625 13.304688 C 23.28125 13.304688 23.46875 13.429688 23.59375 13.234375 C 23.601562 13.226562 23.695312 13.257812 23.726562 13.289062 C 23.992188 13.570312 24.351562 13.585938 24.695312 13.632812 C 24.84375 13.65625 24.992188 13.625 25.125 13.734375 C 25.203125 13.796875 25.3125 13.773438 25.390625 13.703125 C 25.570312 13.515625 25.742188 13.609375 25.960938 13.65625 C 26.523438 13.78125 26.882812 14.148438 27.257812 14.53125 C 27.53125 14.8125 27.867188 15.039062 28.1875 15.265625 C 28.359375 15.390625 28.40625 15.515625 28.296875 15.6875 C 28.1875 15.867188 28.0625 16.039062 27.945312 16.210938 C 27.914062 16.257812 27.875 16.289062 27.851562 16.335938 C 27.679688 16.734375 27.679688 16.734375 27.25 16.5625 C 27.234375 16.554688 27.210938 16.5625 27.164062 16.5625 C 27.179688 16.765625 27.023438 16.929688 27 17.132812 C 26.984375 17.28125 26.859375 17.273438 26.765625 17.296875 C 26.664062 17.320312 26.554688 17.335938 26.492188 17.210938 C 26.429688 17.09375 26.351562 16.976562 26.304688 16.851562 C 26.179688 16.554688 25.796875 16.328125 25.460938 16.414062 C 25.164062 16.492188 24.851562 16.492188 24.601562 16.265625 C 24.539062 16.210938 24.460938 16.226562 24.390625 16.234375 C 24.0625 16.273438 23.726562 16.3125 23.398438 16.359375 C 23.25 16.382812 23.117188 16.398438 22.976562 16.296875 C 22.804688 16.171875 22.796875 16.1875 22.632812 16.445312 C 22.460938 16.171875 22.210938 16.125 21.914062 16.109375 C 21.460938 16.09375 21.085938 16.273438 20.859375 16.617188 C 20.570312 17.070312 20.242188 17.320312 19.695312 17.195312 C 19.40625 17.132812 19.164062 17.257812 18.921875 17.367188 C 18.835938 17.296875 18.828125 17.1875 18.734375 17.148438 C 18.570312 17.070312 18.539062 16.960938 18.59375 16.773438 C 18.679688 16.46875 18.515625 16.28125 18.234375 16.296875 C 18.15625 16.304688 18.0625 16.320312 18.054688 16.398438 C 18.015625 16.671875 17.828125 16.6875 17.617188 16.679688 C 17.46875 16.671875 17.382812 16.757812 17.296875 16.882812 C 17.171875 17.0625 17.015625 17.242188 16.773438 16.976562 C 16.6875 16.882812 16.515625 16.835938 16.375 16.953125 C 16.226562 17.070312 16.335938 17.1875 16.390625 17.289062 C 16.546875 17.570312 16.46875 17.796875 16.28125 18.039062 C 15.984375 18.421875 15.71875 18.820312 15.367188 19.15625 C 15.304688 19.21875 15.28125 19.320312 15.25 19.40625 C 15.171875 19.625 15.101562 19.84375 14.960938 20.039062 C 14.6875 19.921875 14.679688 19.617188 14.515625 19.445312 C 14.304688 19.21875 14.03125 19.453125 13.796875 19.34375 C 13.890625 19.242188 13.96875 19.148438 14.054688 19.0625 C 13.976562 18.898438 13.851562 18.757812 13.914062 18.5625 C 13.921875 18.523438 13.890625 18.445312 13.851562 18.421875 C 13.578125 18.25 13.539062 17.992188 13.460938 17.703125 C 13.398438 17.460938 13.40625 17.289062 13.515625 17.085938 C 13.570312 16.976562 13.632812 16.859375 13.609375 16.703125 C 13.296875 16.617188 13.140625 16.289062 12.828125 16.171875 C 12.945312 15.875 12.945312 15.875 12.476562 15.414062 C 12.617188 15.257812 12.78125 15.25 12.945312 15.351562 C 13.140625 15.476562 13.242188 15.421875 13.28125 15.210938 C 13.3125 15.039062 13.507812 15 13.5625 14.84375 C 13.6875 14.492188 13.570312 14.195312 13.132812 13.851562 C 13.117188 13.84375 13.101562 13.828125 13.085938 13.804688 Z M 13.085938 13.804688 "/>
                            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 12.695312 13.179688 C 13.023438 13.054688 13.203125 12.757812 13.453125 12.53125 C 13.679688 12.320312 13.65625 12.085938 13.40625 11.914062 C 13.257812 11.8125 13.03125 11.789062 13.007812 11.554688 C 13.023438 11.539062 13.03125 11.515625 13.046875 11.5 C 13.445312 11.210938 13.515625 11.078125 13.335938 10.632812 C 13.25 10.421875 13.171875 10.203125 13.15625 9.984375 C 13.140625 9.789062 13.25 9.578125 13.109375 9.382812 C 13.28125 9.265625 13.4375 9.15625 13.585938 9.023438 C 13.804688 8.8125 14.117188 8.804688 14.414062 8.9375 C 14.570312 9.007812 14.71875 9.09375 14.875 9.132812 C 15.328125 9.25 15.757812 9.25 16.101562 8.875 C 16.132812 8.835938 16.203125 8.796875 16.234375 8.804688 C 16.59375 8.898438 16.976562 8.851562 17.320312 9.117188 C 17.625 9.351562 17.960938 9.679688 18.382812 9.578125 C 18.625 9.515625 18.804688 9.453125 19.007812 9.625 C 19.039062 9.648438 19.09375 9.664062 19.109375 9.695312 C 19.257812 10.140625 19.664062 10.125 20.007812 10.210938 C 20.148438 10.25 20.296875 10.226562 20.40625 10.09375 C 20.554688 9.914062 20.757812 9.898438 20.945312 9.976562 C 21.148438 10.0625 21.210938 10.21875 21.203125 10.476562 C 21.195312 10.953125 21.367188 11.398438 21.75 11.71875 C 21.898438 11.84375 22.046875 11.796875 22.1875 11.742188 C 22.632812 11.570312 23.0625 11.515625 23.53125 11.695312 C 23.710938 11.765625 23.859375 11.5 24.078125 11.4375 C 24.039062 11.671875 24.265625 11.625 24.382812 11.71875 C 24.375 11.921875 24.164062 11.976562 24.085938 12.140625 C 23.992188 12.335938 23.789062 12.132812 23.632812 12.15625 C 23.203125 12.226562 22.796875 12.015625 22.351562 12.070312 C 22.34375 12.109375 22.335938 12.164062 22.328125 12.226562 C 22.257812 12.703125 22.296875 12.6875 22.75 12.679688 C 22.890625 12.679688 23.078125 12.804688 23.203125 12.609375 C 23.210938 12.601562 23.304688 12.632812 23.335938 12.664062 C 23.601562 12.945312 23.960938 12.960938 24.304688 13.007812 C 24.453125 13.03125 24.601562 13 24.734375 13.109375 C 24.8125 13.171875 24.921875 13.148438 25 13.078125 C 25.179688 12.890625 25.351562 12.984375 25.570312 13.03125 C 26.132812 13.15625 26.492188 13.523438 26.867188 13.90625 C 27.140625 14.1875 27.476562 14.414062 27.796875 14.640625 C 27.96875 14.765625 28.015625 14.890625 27.90625 15.0625 C 27.796875 15.242188 27.671875 15.414062 27.554688 15.585938 C 27.523438 15.632812 27.484375 15.664062 27.460938 15.710938 C 27.289062 16.109375 27.289062 16.109375 26.859375 15.9375 C 26.84375 15.929688 26.820312 15.9375 26.773438 15.9375 C 26.789062 16.140625 26.632812 16.304688 26.609375 16.507812 C 26.59375 16.65625 26.46875 16.648438 26.375 16.671875 C 26.273438 16.695312 26.164062 16.710938 26.101562 16.585938 C 26.039062 16.46875 25.960938 16.351562 25.914062 16.226562 C 25.789062 15.929688 25.40625 15.703125 25.070312 15.789062 C 24.773438 15.867188 24.460938 15.867188 24.210938 15.640625 C 24.148438 15.585938 24.070312 15.601562 24 15.609375 C 23.671875 15.648438 23.335938 15.6875 23.007812 15.734375 C 22.859375 15.757812 22.726562 15.773438 22.585938 15.671875 C 22.414062 15.546875 22.40625 15.5625 22.242188 15.820312 C 22.070312 15.546875 21.820312 15.5 21.523438 15.484375 C 21.070312 15.46875 20.695312 15.648438 20.46875 15.992188 C 20.179688 16.445312 19.851562 16.695312 19.304688 16.570312 C 19.015625 16.507812 18.773438 16.632812 18.53125 16.742188 C 18.445312 16.671875 18.4375 16.5625 18.34375 16.523438 C 18.179688 16.445312 18.148438 16.335938 18.203125 16.148438 C 18.289062 15.84375 18.125 15.65625 17.84375 15.671875 C 17.765625 15.679688 17.671875 15.695312 17.664062 15.773438 C 17.625 16.046875 17.4375 16.0625 17.226562 16.054688 C 17.078125 16.046875 16.992188 16.132812 16.90625 16.257812 C 16.78125 16.4375 16.625 16.617188 16.382812 16.351562 C 16.296875 16.257812 16.125 16.210938 15.984375 16.328125 C 15.835938 16.445312 15.945312 16.5625 16 16.664062 C 16.15625 16.945312 16.078125 17.171875 15.890625 17.414062 C 15.59375 17.796875 15.328125 18.195312 14.976562 18.53125 C 14.914062 18.59375 14.890625 18.695312 14.859375 18.78125 C 14.78125 19 14.710938 19.21875 14.570312 19.414062 C 14.296875 19.296875 14.289062 18.992188 14.125 18.820312 C 13.914062 18.59375 13.640625 18.828125 13.40625 18.71875 C 13.5 18.617188 13.578125 18.523438 13.664062 18.4375 C 13.585938 18.273438 13.460938 18.132812 13.523438 17.9375 C 13.53125 17.898438 13.5 17.820312 13.460938 17.796875 C 13.1875 17.625 13.148438 17.367188 13.070312 17.078125 C 13.007812 16.835938 13.015625 16.664062 13.125 16.460938 C 13.179688 16.351562 13.242188 16.234375 13.21875 16.078125 C 12.90625 15.992188 12.75 15.664062 12.4375 15.546875 C 12.554688 15.25 12.554688 15.25 12.085938 14.789062 C 12.226562 14.632812 12.390625 14.625 12.554688 14.726562 C 12.75 14.851562 12.851562 14.796875 12.890625 14.585938 C 12.921875 14.414062 13.117188 14.375 13.171875 14.21875 C 13.296875 13.867188 13.179688 13.570312 12.742188 13.226562 C 12.726562 13.21875 12.710938 13.203125 12.695312 13.179688 Z M 12.695312 13.179688 "/>
                            </g>
                            </svg>                  --}}
                        <span class="uppercase text-blue-900 font-extrabold text-2xl">{{ str_replace('i', 'í', config('app.name')) }}</span>
                        </a>
                    </div>

                    <div class="flex justify-between w-full px-4">

                        <div class="flex content-start w-64">
                            {{-- toggle button md/lg/xl screen --}}
                            <button id="admin-navbar-primary-toggle-button" class="toggle-button is-opened p-4 focus:outline-none justify-center hidden md:block" onclick="handleToggleButton()">
                                <div class="toggle-button-inner-wrapper">
                                    {{-- add class focus:bg-gray-300 to set bg in focus --}}
                                    <span class="icon toggle-button-icon"></span>
                                    <span class="icon toggle-button-icon-to-hide"></span>
                                    {{-- <i class="fas fa-bars fa-lg mobile-sidebar-button-open-icon"></i>
                                    <i class="fas fa-times fa-lg mobile-sidebar-button-close-icon invisible"></i> --}}
                                </div>
                            </button>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">

                            <!-- Right Side Of Navbar -->
                            {{-- <ul class="navbar-nav ml-auto">
                                @foreach (config('app.available_locales') as $locale)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                        href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                            @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                                    </li>
                                @endforeach
                            </ul> --}}

                            @if(count(config('app.languages')) > 1)
                                <x-jet-dropdown width="60 text-gray-500">
                                            <x-slot name="trigger">
                                                <a class="nav-link text-gray-500 hidden sm:hidden lg:inline-block" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-globe mr-2"></i><span class="hidden sm:hidden lg:inline-block">{{ strtoupper(app()->getLocale()) }}</span>
                                                </a>
                                            </x-slot>
                                            <x-slot name="content">
                                                <div class="w-40 hidden md:inline-block">
                                                    @foreach(config('app.languages') as $langLocale => $langName)
                                                    <x-jet-dropdown-link href="{{ route('set.locale', $langLocale) }}">
                                                        {{ $langName }}
                                                    </x-jet-dropdown-link>
                                                        {{-- <a class="dropdown-item px-4 py-24" href="{{ route('set.locale', $langLocale) }}">{{ $langName }}</a><br> --}}
                                                        {{-- <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a> --}}
                                                    @endforeach
                                                </div>
                                            </x-slot>
                                </x-jet-dropdown>
                            @endif

                            {{-- @auth
                                <!-- Teams Dropdown -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->current_team_id)
                                    <div class="ml-3 relative">
                                        <x-jet-dropdown align="right" width="60">
                                            <x-slot name="trigger">
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                        {{ Auth::user()->currentTeam->name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </x-slot>

                                            <x-slot name="content">
                                                <div class="w-60">
                                                    <!-- Team Management -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Team') }}
                                                    </div>

                                                    <!-- Team Settings -->
                                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                        {{ __('Team Settings') }}
                                                    </x-jet-dropdown-link>

                                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                            {{ __('Create New Team') }}
                                                        </x-jet-dropdown-link>
                                                    @endcan

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Team Switcher -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-jet-switchable-team :team="$team" />
                                                    @endforeach
                                                </div>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                @endif
                            @endauth --}}

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative flex items-center">
                                @auth
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                        {{ Auth::user()->name }}
                                                        {{-- TODO: Fix show user role {{ Auth::user()->roles()->name }} --}}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account -->
                                            <div class="block px-4 py-2 text-md font-bold text-gray-900">
                                                {{ __('Account') }}
                                            </div>

                                            <x-jet-dropdown-link href="{{ route('profile.show', app()->getLocale() ) }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Management -->
                                            <div class="block px-4 py-2 text-md font-bold text-gray-900">
                                                {{ __('Manage') }}
                                            </div>

                                            @can ('view-dashboard')
                                                <x-jet-dropdown-link href="{{ route('admin.cpanel', App::getLocale() ) }}">
                                                    {{ __('Control Panel') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <!-- TODO: Create permission LMS Crear contenido -->
                                            @can ('create-post')
                                                <x-jet-dropdown-link href="{{ route('creator.courses.index', app()->getLocale() ) }}">
                                                    {{ __('Courses') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <!-- TODO: Create permission LMS Crear contenido -->
                                            {{-- @can ('view-dashboard')
                                                <x-jet-dropdown-link href="{{ route('creator.dashboard', app()->getLocale()) }}">
                                                    {{ __('Settings') }}
                                                </x-jet-dropdown-link>
                                            @endcan --}}

                                            @can ('create-course')
                                                <x-jet-dropdown-link href="{{ route('instructor.dashboard.index', app()->getLocale() ) }}">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Help -->

                                            <x-jet-dropdown-link href="{{ route('pages.docs.overview', app()->getLocale() ) }}">
                                                {{ __('Help Center') }}
                                            </x-jet-dropdown-link>


                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout', app()->getLocale() ) }}">
                                                @csrf

                                                <x-jet-dropdown-link href="{{ route('logout', app()->getLocale() ) }}"
                                                        onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                    {{ __('Logout') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                @else

                                <!-- Register button -->
                                    @if (Route::has('register'))
                                        <a href="{{ route('register', app()->getLocale() ) }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent bg-gray-100 rounded-md shadow-sm text-sm max-w-prose font-medium text-blue-900 hover:bg-gray-200  hover:shadow" >{{ __('Register') }}</a>
                                    @endif

                                    <!-- Login button -->
                                    <a href="{{ route('login', app()->getLocale() ) }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm max-w-prose font-medium text-white hover:shadow" style="background-color: #003876;">{{ __('Sign In') }}</a>


                                @endauth
                            </div>
                        </div>

                        <!-- mobile menu toggle button -->
                        <button id="admin-navbar-responsive-toggle-button" class="toggle-button is-text p-4 focus:outline-none justify-center md:hidden" onclick="handleResponsiveToggleButton()">
                            <div class="toggle-button-inner-wrapper">
                                {{-- add class focus:bg-gray-300 to set bg in focus --}}
                                <span class="icon toggle-button-icon"></span>
                                <span class="icon toggle-button-icon-to-hide"></span>
                                {{-- <i class="fas fa-bars fa-lg mobile-sidebar-button-open-icon"></i>
                                <i class="fas fa-times fa-lg mobile-sidebar-button-close-icon invisible"></i> --}}
                            </div>
                        </button>
                    </div>

                </div>
