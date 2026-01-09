<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ app()->getLocale() == 'id' ? 'Rudi Adrian | Website Saya' : 'Rudi Adrian | My Website' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        .bg-dots { background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 24px 24px; }
        .dark .bg-dots { background-image: radial-gradient(#334155 1px, transparent 1px); }

        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
        .reveal.active { opacity: 1; transform: translateY(0); }

        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }

        section { scroll-margin-top: 100px; }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800 dark:bg-[#0B1120] dark:text-slate-200 transition-colors duration-300 selection:bg-blue-500/30 selection:text-blue-300">

    <nav id="navbar" class="fixed top-0 sm:top-4 inset-x-0 max-w-7xl mx-auto z-50 px-4 transition-all duration-300">
        <div class="bg-white/80 dark:bg-[#1a2236]/80 backdrop-blur-xl border-b sm:border border-slate-200 dark:border-slate-700/50 p-3 pl-4 sm:rounded-2xl flex justify-between items-center shadow-sm">

            <a href="#" class="flex items-center gap-3 group focus:outline-none">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:rotate-12 transition-transform duration-300">
                    <span class="font-extrabold text-lg tracking-tighter">RA</span>
                </div>
                <div class="hidden sm:block leading-tight">
                    <span class="block font-bold text-slate-900 dark:text-white tracking-tight group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Rudi Adrian</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-1 bg-slate-100/50 dark:bg-slate-800/50 p-1.5 rounded-full border border-slate-200/50 dark:border-slate-700/50">
                <a href="#home" class="nav-link px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white dark:hover:bg-slate-700" data-target="home">
                    {{ app()->getLocale() == 'id' ? 'Beranda' : 'Home' }}
                </a>
                <a href="#about" class="nav-link px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white dark:hover:bg-slate-700" data-target="about">
                    {{ app()->getLocale() == 'id' ? 'Keahlian' : 'Expertise' }}
                </a>
                <a href="#tech" class="nav-link px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white dark:hover:bg-slate-700" data-target="tech">
                    {{ app()->getLocale() == 'id' ? 'Teknologi' : 'Tech Stack' }}
                </a>
                <a href="#projects" class="nav-link px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white dark:hover:bg-slate-700" data-target="projects">
                    {{ app()->getLocale() == 'id' ? 'Proyek' : 'Projects' }}
                </a>
            </div>

            <div class="flex items-center gap-3">
                 <div class="hidden sm:flex text-xs font-bold bg-slate-100 dark:bg-slate-800/80 rounded-lg p-1">
                    <a href="{{ route('lang.switch', 'id') }}" class="px-2 py-1 rounded-md transition-colors {{ app()->getLocale() == 'id' ? 'bg-white dark:bg-slate-700 shadow-sm text-blue-700 dark:text-blue-400' : 'text-slate-400 hover:text-slate-600' }}">ID</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-2 py-1 rounded-md transition-colors {{ app()->getLocale() == 'en' ? 'bg-white dark:bg-slate-700 shadow-sm text-blue-700 dark:text-blue-400' : 'text-slate-400 hover:text-slate-600' }}">EN</a>
                </div>

                <button id="theme-toggle" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800/80 hover:bg-slate-200 dark:hover:bg-slate-700 flex items-center justify-center transition-colors text-slate-500 dark:text-slate-400">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>

                <button id="mobile-menu-btn" class="md:hidden w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden absolute top-full left-4 right-4 mt-2 bg-white dark:bg-[#1a2236] border border-slate-200 dark:border-slate-700 p-4 rounded-2xl shadow-xl md:hidden">
            <div class="flex flex-col gap-2">
                <a href="#home" class="px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 font-medium">{{ app()->getLocale() == 'id' ? 'Beranda' : 'Home' }}</a>
                <a href="#about" class="px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 font-medium">{{ app()->getLocale() == 'id' ? 'Keahlian' : 'Expertise' }}</a>
                <a href="#tech" class="px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 font-medium">{{ app()->getLocale() == 'id' ? 'Teknologi' : 'Tech Stack' }}</a>
                <a href="#projects" class="px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 font-medium">{{ app()->getLocale() == 'id' ? 'Proyek' : 'Projects' }}</a>
                <div class="h-px bg-slate-100 dark:bg-slate-700 my-1"></div>
                <div class="flex gap-4 px-4 py-2">
                     <a href="{{ route('lang.switch', 'id') }}" class="text-sm font-bold {{ app()->getLocale() == 'id' ? 'text-blue-600' : 'text-slate-500' }}">ID</a>
                     <a href="{{ route('lang.switch', 'en') }}" class="text-sm font-bold {{ app()->getLocale() == 'en' ? 'text-blue-600' : 'text-slate-500' }}">EN</a>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="min-h-screen flex items-center pt-28 pb-10 relative overflow-hidden bg-dots">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/4 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-400/20 dark:bg-indigo-600/10 rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 w-full relative z-10 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <div class="space-y-8 text-center lg:text-left reveal active">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-blue-700 dark:text-blue-400 text-xs sm:text-sm font-bold shadow-sm backdrop-blur-sm">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-600"></span>
                    </span>
                    {{ app()->getLocale() == 'id' ? 'Tersedia untuk Proyek Baru' : 'Available for New Projects' }}
                </div>

                <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tight leading-[1.1]">
                    <span class="block text-slate-900 dark:text-white">The Hybrid</span>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 dark:from-blue-400 dark:via-indigo-400 dark:to-purple-400 animate-gradient">IT Specialist.</span>
                </h1>

                <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    {{ app()->getLocale() == 'id'
                       ? 'Saya menjembatani pengembangan Software yang kompleks dengan infrastruktur IT yang tangguh, aman, dan efisien.'
                       : 'Bridging the gap between complex Software development and robust, secure, and efficient IT infrastructure.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#projects" class="px-8 py-4 bg-slate-900 dark:bg-blue-600 text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1 transition-all duration-300">
                        {{ app()->getLocale() == 'id' ? 'Lihat Portfolio' : 'View Portfolio' }}
                    </a>
                    <a href="mailto:rudi.adriian@gmail.com" class="px-8 py-4 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-2xl font-bold hover:bg-slate-50 dark:hover:bg-slate-700/80 transition-all duration-300">
                        {{ app()->getLocale() == 'id' ? 'Hubungi Saya' : 'Contact Me' }}
                    </a>
                </div>

                <div class="pt-8 border-t border-slate-200 dark:border-slate-800/50 flex justify-center lg:justify-start gap-12">
                     <div>
                        <div class="text-2xl font-bold text-slate-900 dark:text-white">9+</div>
                        <div class="text-xs text-slate-500 uppercase font-bold">{{ app()->getLocale() == 'id' ? 'Tahun Pengalaman' : 'Years Exp' }}</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-900 dark:text-white">20+</div>
                        <div class="text-xs text-slate-500 uppercase font-bold">{{ app()->getLocale() == 'id' ? 'Proyek Selesai' : 'Projects Done' }}</div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block relative reveal delay-200">
                <div class="relative w-full max-w-md mx-auto">
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[2.5rem] rotate-6 opacity-30 blur-lg dark:opacity-40 animate-pulse"></div>

                    <div class="relative aspect-[4/5] rounded-[2rem] overflow-hidden border-[6px] border-white dark:border-slate-800 shadow-2xl group transform transition duration-500 hover:rotate-1 bg-slate-200 dark:bg-slate-800">
                        <img src="{{ asset('rudi.png') }}" alt="Rudi Adrian" class="w-full h-full object-cover transform transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-6 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">
                            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-xl text-white">
                                <p class="font-bold text-xl leading-none">Rudi Adrian</p>
                                <p class="text-xs text-blue-200 uppercase tracking-wider font-semibold mt-1">Full Stack Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -right-8 top-12 bg-white dark:bg-slate-800 p-4 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-slate-100 dark:border-slate-700 animate-float">
                        <div class="flex items-center gap-3">
                            <div class="relative w-3 h-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider">Status</p>
                                <p class="font-bold text-sm text-slate-900 dark:text-white leading-none">Open to Work</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -left-8 bottom-24 bg-white dark:bg-slate-800 p-3 rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 flex items-center gap-3 animate-float" style="animation-delay: 2s;">
                        <div class="p-2.5 bg-red-50 dark:bg-red-900/30 rounded-xl text-red-600 dark:text-red-400">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <div class="pr-2">
                            <p class="text-xs text-slate-500 dark:text-slate-400 font-bold">Core Focus</p>
                            <p class="font-bold text-slate-900 dark:text-white">Security & Dev</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white dark:bg-[#0B1120] relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16 reveal">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">
                    {{ app()->getLocale() == 'id' ? 'Keahlian & Spesialisasi' : 'Expertise & Specialization' }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    {{ app()->getLocale() == 'id' ? 'Gabungan unik antara pengembangan aplikasi modern dan manajemen infrastruktur.' : 'A unique blend of modern application development and infrastructure management.' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="group p-8 bg-slate-50 dark:bg-[#131c31] border border-slate-200 dark:border-slate-700/50 rounded-[2.5rem] hover:border-blue-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-900 dark:text-white">Software Development</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        {{ app()->getLocale() == 'id'
                            ? 'Membangun aplikasi web dan desktop yang scalable, modern, dan user-friendly.'
                            : 'Building scalable, modern, and user-friendly web and desktop applications.' }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Web & Desktop Apps
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Enterprise Resource Planning (ERP)
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> REST API & Integrations
                        </li>
                    </ul>
                </div>

                <div class="group p-8 bg-slate-50 dark:bg-[#131c31] border border-slate-200 dark:border-slate-700/50 rounded-[2.5rem] hover:border-indigo-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 reveal delay-100">
                    <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-900 dark:text-white">Infrastructure & Security</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        {{ app()->getLocale() == 'id'
                           ? 'Memastikan sistem berjalan aman, stabil, dan terlindungi dari ancaman siber.'
                           : 'Ensuring systems run securely, stably, and protected from cyber threats.' }}
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span> IT Support & Troubleshooting
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Antivirus & Security
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Fortinet Firewall Management
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="tech" class="py-24 bg-slate-50 dark:bg-[#0f172a] relative border-t border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4">
             <div class="text-center mb-16 reveal">
                <span class="text-blue-600 dark:text-blue-400 font-bold tracking-wider uppercase text-xs">
                    {{ app()->getLocale() == 'id' ? 'Kemampuan Teknis' : 'Technical Arsenal' }}
                </span>
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mt-2">
                    {{ app()->getLocale() == 'id' ? 'Alat & Teknologi' : 'Tools & Technologies' }}
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-[#1a2236] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700 hover:border-blue-500/50 transition reveal">
                    <h3 class="font-bold text-lg mb-6 text-slate-800 dark:text-white flex items-center gap-3">
                        <span class="p-2 bg-blue-100 dark:bg-blue-900/50 text-blue-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg></span>
                        {{ app()->getLocale() == 'id' ? 'Bahasa' : 'Languages' }}
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['PHP', 'Javascript', 'C#', 'HTML', 'CSS', 'Tailwind'] as $item)
                        <span class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700/30 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-semibold hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 transition cursor-default">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-[#1a2236] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700 hover:border-indigo-500/50 transition reveal delay-100">
                    <h3 class="font-bold text-lg mb-6 text-slate-800 dark:text-white flex items-center gap-3">
                         <span class="p-2 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg></span>
                        Frameworks
                    </h3>
                    <div class="flex flex-wrap gap-2">
                         @foreach(['Laravel', 'CodeIgniter', 'VueJs', 'Bootstrap'] as $item)
                        <span class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700/30 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-semibold hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 transition cursor-default">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-[#1a2236] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700 hover:border-green-500/50 transition reveal delay-200">
                    <h3 class="font-bold text-lg mb-6 text-slate-800 dark:text-white flex items-center gap-3">
                         <span class="p-2 bg-green-100 dark:bg-green-900/50 text-green-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg></span>
                        {{ app()->getLocale() == 'id' ? 'Basis Data' : 'Databases' }}
                    </h3>
                    <div class="flex flex-wrap gap-2">
                         @foreach(['MySQL', 'PostgreSQL'] as $item)
                        <span class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700/30 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-semibold hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-600 transition cursor-default">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-[#1a2236] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700 hover:border-red-500/50 transition reveal">
                    <h3 class="font-bold text-lg mb-6 text-slate-800 dark:text-white flex items-center gap-3">
                        <span class="p-2 bg-red-100 dark:bg-red-900/50 text-red-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></span>
                        {{ app()->getLocale() == 'id' ? 'Keamanan' : 'Security' }}
                    </h3>
                    <div class="flex flex-wrap gap-2">
                         @foreach(['Kaspersky', 'Trend Micro', 'Fortinet'] as $item)
                        <span class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700/30 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-semibold hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 transition cursor-default">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-[#1a2236] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700 hover:border-orange-500/50 transition md:col-span-2 reveal delay-100">
                    <h3 class="font-bold text-lg mb-6 text-slate-800 dark:text-white flex items-center gap-3">
                        <span class="p-2 bg-orange-100 dark:bg-orange-900/50 text-orange-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></span>
                        Integrations & DevOps
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Accurate', 'REST API', 'Git', 'GitHub', 'Slack', 'Jira', 'Postman', 'ChatGPT', 'Office 365', 'PowerBI', 'Dahua', 'Webuzo', 'cPanel', 'SMTP'] as $item)
                        <span class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700/30 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-semibold hover:bg-orange-50 dark:hover:bg-orange-900/20 hover:text-orange-600 transition cursor-default">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-24 bg-white dark:bg-[#0B1120] relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="mb-16 text-center reveal">
                 <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">
                     {{ app()->getLocale() == 'id' ? 'Proyek Unggulan' : 'Featured Projects' }}
                 </h2>
                 <p class="text-slate-600 dark:text-slate-400">
                     {{ app()->getLocale() == 'id' ? 'Pilihan solusi yang berdampak tinggi.' : 'Selected high-impact solutions.' }}
                 </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="group bg-slate-50 dark:bg-[#131c31] rounded-[2rem] p-8 border border-slate-200 dark:border-slate-700/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full relative overflow-hidden reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="flex justify-between items-start mb-6">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-slate-200 text-slate-600 dark:bg-slate-700 dark:text-slate-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path></svg>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-800 px-3 py-1 rounded-full border border-slate-100 dark:border-slate-700">
                                {{ $project['category'] }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 leading-tight group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 flex-grow">
                            {{ $project['desc'] }}
                        </p>
                        <div class="pt-4 border-t border-slate-200 dark:border-slate-700/50 mt-auto">
                            <span class="text-xs font-mono font-semibold text-blue-600 dark:text-blue-400 flex items-center gap-2">
                                 <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                 {{ $project['tech'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-slate-50 dark:bg-[#0f172a] border-t border-slate-200 dark:border-slate-800 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4">
             <div class="grid md:grid-cols-2 gap-12 mb-16">
                 <div>
                     <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">
                         {{ app()->getLocale() == 'id' ? 'Mari Bekerja Sama.' : 'Let\'s work together.' }}
                     </h2>
                     <p class="text-slate-600 dark:text-slate-400 max-w-sm mb-8">
                         {{ app()->getLocale() == 'id'
                            ? 'Mencari solusi IT yang solid atau pengembangan aplikasi khusus? Mari diskusikan kebutuhan Anda.'
                            : 'Looking for a solid IT solution or custom app development? Let\'s discuss your needs.' }}
                     </p>
                     <a href="mailto:rudi.adriian@gmail.com" class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 font-bold hover:gap-4 transition-all">
                         rudi.adriian@gmail.com <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                     </a>
                 </div>
                 <div class="grid grid-cols-2 gap-4">
                     <a href="https://linkedin.com/in/rudiadriian" target="_blank" class="p-6 bg-white dark:bg-[#1a2236] rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-blue-500 hover:shadow-lg transition group">
                         <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                         </div>
                         <span class="font-bold text-slate-900 dark:text-white">LinkedIn</span>
                     </a>
                     <a href="https://instagram.com/rudiadriian" target="_blank" class="p-6 bg-white dark:bg-[#1a2236] rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-pink-500 hover:shadow-lg transition group">
                         <div class="w-10 h-10 bg-pink-100 dark:bg-pink-900/30 text-pink-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01M7.5 3h9a4.5 4.5 0 014.5 4.5v9a4.5 4.5 0 01-4.5 4.5h-9A4.5 4.5 0 013 19.5v-9A4.5 4.5 0 017.5 3z"></path></svg>
                         </div>
                         <span class="font-bold text-slate-900 dark:text-white">Instagram</span>
                     </a>
                 </div>
             </div>

            <div class="border-t border-slate-200 dark:border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">&copy; {{ date('Y') }} Rudi Adrian. Depok, West Java.</p>
                <p class="text-xs font-mono text-slate-400">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </div>
        </div>
    </footer>

    <script>
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        function updateThemeIcons() {
            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }
        updateThemeIcons();

        themeToggleBtn.addEventListener('click', function() {
            if (localStorage.theme === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
            updateThemeIcons();
        });

        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section');
        const observerOptions = { threshold: 0.2, rootMargin: "-100px 0px 0px 0px" };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        link.classList.remove('bg-white', 'dark:bg-slate-700', 'shadow-sm', 'text-blue-600', 'dark:text-blue-400');
                        link.classList.add('hover:bg-white', 'dark:hover:bg-slate-700');
                    });
                    const activeLink = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
                    if (activeLink) {
                        activeLink.classList.remove('hover:bg-white', 'dark:hover:bg-slate-700');
                        activeLink.classList.add('bg-white', 'dark:bg-slate-700', 'shadow-sm', 'text-blue-600', 'dark:text-blue-400');
                    }
                }
            });
        }, observerOptions);
        sections.forEach(section => observer.observe(section));

        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) entry.target.classList.add('active');
            });
        }, { threshold: 0.1 });
        revealElements.forEach(el => revealObserver.observe(el));
    </script>
</body>
</html>
