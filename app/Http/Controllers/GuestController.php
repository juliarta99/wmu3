<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\Showcase;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $year = now()->year;
        $visitor = Visitor::where('year', $year)->first();

        $routeTarget = "showcase";
        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        }

        if(!$visitor) {
            Visitor::create([
                'year' => $year,
                'count_visitor' => 1
            ]);
        } else {
            if(!Auth::check()) {
                $visitor->count_visitor += 1;
                $visitor->save();
            }
        }
        $title = "";

        $mainSponsors = [
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
            [
                'logo' => asset('assets/images/sponsors/main/bca.webp'),
                'name' => 'BCA'
            ],
        ];
        $supportSponsors = [
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
            [
                'logo' => asset('assets/images/sponsors/support/bni.webp'),
                'name' => 'BNI'
            ],
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

        $faqs = [
            [
                'question' => 'Apa itu aplikasi ini?',
                'answer'   => 'Aplikasi ini digunakan untuk mempermudah manajemen data secara real-time.'
            ],
            [
                'question' => 'Bagaimana cara mendaftar?',
                'answer'   => 'Klik tombol daftar di halaman utama, isi form, lalu submit.'
            ],
            [
                'question' => 'Apakah data saya aman?',
                'answer'   => 'Ya, semua data disimpan dengan enkripsi dan backup rutin.'
            ],
            [
                'question' => 'Bisakah saya mengubah informasi akun?',
                'answer'   => 'Tentu, masuk ke pengaturan akun dan pilih opsi edit profil.'
            ],
            [
                'question' => 'Siapa yang bisa menghubungi support?',
                'answer'   => 'Setiap pengguna bisa menghubungi support melalui email atau chat live di dashboard.'
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

        return view('welcome', compact('title', 'routeTarget', 'mainSponsors', 'supportSponsors', 'showcases', 'faqs', 'timelines', 'contactPersons'));
    }

    public function showcases(Request $request) {
        $title = "Showcase - ";

        $routeTarget = "showcase";
        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
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
                    ->paginate(2)
                    ->appends($request->query());
        
        return view('showcase.index', compact('title', 'routeTarget', 'showcases'));
    }

    public function showcase(Showcase $showcase) {
        $showcase->load('team', 'team.contributors');
        $title = "Detail Showcase - ";

        $routeTarget = "showcase";
        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        }

        return view('showcase.show', compact('title', 'routeTarget', 'showcase'));
    }

    public function quiz() {
        $title = "Quiz - ";

        $routeTarget = "showcase";
        if ($this->isLinkAccessible('register')) {
            $routeTarget = 'register';
        } elseif ($this->isLinkAccessible('pre-test') || $this->isLinkAccessible('post-test')) {
            $routeTarget = 'quiz';
        }

        $postTestLink = ShortLink::where("back_half", "post-test")->first();
        $preTestLink = ShortLink::where("back_half", "pre-test")->first();

        if($postTestLink->is_expired || $postTestLink->is_not_started || $preTestLink->is_not_started || $preTestLink->is_expired) {
            abort(404);
        }

        return view('quiz', compact('title', 'routeTarget', 'postTestLink', 'preTestLink'));
    }
}
