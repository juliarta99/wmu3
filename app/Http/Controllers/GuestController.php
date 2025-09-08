<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\Showcase;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\IssetPass;

class GuestController extends Controller
{
    protected function isLinkAccessible($type) {
        $link = ShortLink::where('back_half', $type)->first() ?? null;

        if (!$link) {
            return false;
        }

        return $link->is_accessible;
    }

    public function index() {
        $title = "";

        $mainSponsors = [
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/lw.png'),
                'name' => 'Living World'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/lw.png'),
                'name' => 'Living World'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bni.webp'),
                'name' => 'BNI'
            ],
        ];
        $supportSponsors = [
            [
                'logo' => asset('assets/images/sponsors/support/biznet.png'),
                'name' => 'Biznet'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bali-banana.png'),
                'name' => 'Bali Banana'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/the-keranjang.png'),
                'name' => 'The Keranjang'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/episode-serpong.png'),
                'name' => 'Episode Serpong'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/starbucks.png'),
                'name' => 'Starbucks'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/biznet.png'),
                'name' => 'Biznet'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bali-banana.png'),
                'name' => 'Bali Banana'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/the-keranjang.png'),
                'name' => 'The Keranjang'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/episode-serpong.png'),
                'name' => 'Episode Serpong'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/starbucks.png'),
                'name' => 'Starbucks'
            ]
        ];

        $year = Carbon::now()->year;
        $showcases = Showcase::whereIn('champion', [1, 2, 3])
            ->whereHas('team', function ($query) use ($year) {
                $query->where('year', $year);
            })
            ->orderBy('champion', 'asc')
            ->get();

        $needed = 3 - $showcases->count();
        if ($needed > 0) {
            $additional = Showcase::whereHas('team', function ($query) use ($year) {
                    $query->where('year', $year);
                })
                ->whereNotIn('id', $showcases->pluck('id'))
                ->orderByDesc('created_at')
                ->take($needed)
                ->get();

            $showcases = $showcases->concat($additional);
        }

        $showcases = $showcases->take(3);
        $hasShowcase = $showcases->count() > 0;

        $routeTarget = "showcase";
        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        } elseif (!$hasShowcase) {
            $routeTarget = 'register';
        }

        $faqs = [
            [
                'question' => 'Apa itu Workshop Multimedia Udayana Vol. 3?',
                'answer'   => 'Workshop Multimedia Udayana Vol. 3 adalah kegiatan yang menggabungkan pembelajaran teori dan praktik di bidang videografi, di mana peserta akan berkolaborasi dalam tim untuk menghasilkan sebuah karya kreatif.'
            ],
            [
                'question' => 'Siapa saja yang bisa mengikuti workshop ini?',
                'answer'   => 'Workshop ini terbuka untuk mahasiswa maupun masyarakat umum yang memiliki minat di bidang multimedia, khususnya videografi, baik pemula maupun yang sudah berpengalaman.'
            ],
            [
                'question' => 'Bagaimana cara mendaftar workshop ini?',
                'answer'   => 'Pendaftaran dapat dilakukan dengan klik tombol Register yang tersedia di bagian header website atau pada section pertama halaman landing page.'
            ],
            [
                'question' => 'Apa yang akan saya dapatkan dari mengikuti workshop ini?',
                'answer'   => 'Peserta akan mendapatkan materi teori, praktik langsung, kesempatan berkolaborasi dalam tim, serta pengalaman menghasilkan karya videografi yang dapat diapresiasi dan dikembangkan lebih lanjut.'
            ],
            [
                'question' => 'Apakah peserta akan mendapatkan sertifikat?',
                'answer'   => 'Ya, setiap peserta yang mengikuti workshop hingga selesai akan mendapatkan sertifikat sebagai bentuk apresiasi dan bukti partisipasi.'
            ],
        ];

        $timelines = [
            [
                'start' => '2025-08-25 00:00:00',
                'end' => '2025-09-11 23:59:59',
                'title' => 'Open Recruitment Peserta',
                'description' => 'Pendaftaran peserta Workshop Multimedia Udayana Vol. 3'
            ],
            [
                'start' => '2025-09-12 00:00:00',
                'end' => '2025-09-13 23:59:59',
                'title' => 'Extended Open Recruitment Peserta',
                'description' => 'Perpanjangan pendaftaran peserta Workshop Multimedia Udayana Vol. 3'
            ],
            [
                'start' => '2025-09-25 00:00:00',
                'end' => '2025-09-26 23:59:59',
                'title' => 'Preparation peserta',
                'description' => 'Persiapan perserta Workshop Multimedia Udayana Vol. 3'
            ],
            [
                'start' => '2025-09-27 00:00:00',
                'end' => '2025-09-27 23:59:59',
                'title' => 'H-H WMU Vol. 3',
                'description' => 'Puncak kegiatan Workshop Multimedia Udayana Vol. 3'
            ],
        ];

        $contactPersons = [
            [
                'name' => 'Budi',
                'wa' => '081999041364',
                'line' => 'belum'
            ],
            [
                'name' => 'Savana',
                'wa' => '083831048161',
                'line' => 'belum'
            ],
        ];

        return view('welcome', compact('title', 'routeTarget', 'mainSponsors', 'supportSponsors', 'showcases', 'faqs', 'timelines', 'contactPersons', 'hasShowcase'));
    }

    public function showcases(Request $request) {
        $title = "Showcase - ";

        $routeTarget = "showcase";
        $year = now()->year;
        $hasShowcase = Showcase::whereHas('team', function ($q) use ($year) {
            $q->where('year', $year);
        })->exists();

        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        } elseif (!$hasShowcase) {
            $routeTarget = 'register';
        }

        $year = Carbon::now()->year;
        $showcaseAvailable = Showcase::whereHas('team', function ($t) use ($year) {
                        $t->where('year', $year);
                    })->exists();
        if(!$showcaseAvailable) {
            abort(404);
        }
        $query = Showcase::query();
        
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhereHas('team', function ($t) use ($search) {
                    $t->where('name', 'like', "%{$search}%");
                });
            });
        }

        $showcases = $query->with('team')
                    ->whereHas('team', function ($t) use ($year) {
                        $t->where('year', $year);
                    })
                    ->paginate(10)
                    ->appends($request->query());
        
        return view('showcase.index', compact('title', 'routeTarget', 'showcases', 'hasShowcase'));
    }

    public function showcase(Showcase $showcase) {
        $showcase->load('team', 'team.contributors');
        $title = "Detail Showcase - ";

        $routeTarget = "showcase";
        $year = now()->year;
        $hasShowcase = Showcase::whereHas('team', function ($q) use ($year) {
            $q->where('year', $year);
        })->exists();

        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        } elseif (!$hasShowcase) {
            $routeTarget = 'register';
        }

        return view('showcase.show', compact('title', 'routeTarget', 'showcase', 'hasShowcase'));
    }

    public function quiz() {
        $title = "Quiz - ";
        $routeTarget = "showcase";
        $year = now()->year;
        $hasShowcase = Showcase::whereHas('team', function ($q) use ($year) {
            $q->where('year', $year);
        })->exists();

        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        } elseif (!$hasShowcase) {
            $routeTarget = 'register';
        }

        $postTestLink = ShortLink::where("back_half", "post-test")->firstOrFail();
        $preTestLink = ShortLink::where("back_half", "pre-test")->firstOrFail();

        if($postTestLink($postTestLink->is_expired || $postTestLink->is_not_started) && ($preTestLink->is_not_started || $preTestLink->is_expired)) {
            abort(404);
        }

        return view('quiz', compact('title', 'routeTarget', 'postTestLink', 'preTestLink', 'hasShowcase'));
    }
}
