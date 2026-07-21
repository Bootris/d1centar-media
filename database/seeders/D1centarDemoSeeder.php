<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Demo content for the d1centar client site: Serbian categories, sample
 * stories (several with YouTube clips) and contact/social settings.
 * Idempotent — keyed by slug, safe to re-run.
 */
class D1centarDemoSeeder extends Seeder
{
    public function run(): void
    {
        // Contact + social settings (feed the footer and contact section).
        foreach ([
            'site_name' => 'd1centar',
            'tagline' => 'Nezavisni lokalni medij, Niš',
            'address' => 'Obrenovićeva 10, Niš',
            'email' => 'redakcija@d1centar.rs',
            'phone' => '+381 18 100 200',
            'working_hours' => 'Pon–Pet, 09–17h',
            'youtube' => 'https://www.youtube.com/@d1centar',
            'instagram' => 'https://www.instagram.com/d1centar',
            'facebook' => 'https://www.facebook.com/d1centar',
        ] as $key => $value) {
            Setting::set($key, $value);
        }

        // Serbian categories for this client.
        $cats = [];
        foreach (['Grad', 'Društvo', 'Kultura', 'Priče', 'Sport'] as $name) {
            $cats[$name] = Category::firstOrCreate(['name' => $name]);
        }

        $body = fn (array $paras) => collect($paras)->map(fn ($p) => "<p>{$p}</p>")->implode("\n");

        $posts = [
            [
                'title' => 'Kako je stara fabrika u Nišu postala prostor za mlade umetnike',
                'category' => 'Grad',
                'author' => 'Nikola Ilić',
                'days' => 1,
                'video' => 'https://www.youtube.com/watch?v=aqz-KE-bpKQ',
                'home' => true,
                'excerpt' => 'Napušteni pogon Duvanske industrije godinama je stajao prazan. Danas u njemu radi tridesetak mladih ljudi, a priča o tome kako se to dogodilo govori više o gradu nego o samoj zgradi.',
                'paras' => [
                    'Kada su prve grupe umetnika ušle u napušteni pogon, nije bilo ni struje ni vode. Danas se u istim halama održavaju izložbe, probe pozorišnih predstava i radionice za decu iz okolnih naselja.',
                    'Grad je prostor ustupio na privremeno korišćenje, ali pitanje trajnog statusa i dalje visi u vazduhu. Korisnici traže ugovor na duži rok kako bi mogli da planiraju.',
                    'Snimili smo jedno popodne u fabrici i razgovarali sa ljudima koji su je vratili u život.',
                ],
            ],
            [
                'title' => 'Sedam meseci bez vode: meštani prigradskog naselja traže odgovore',
                'category' => 'Društvo',
                'author' => 'Ana Petrović',
                'days' => 2,
                'video' => 'https://www.youtube.com/watch?v=jNQXAC9IVRw',
                'home' => false,
                'excerpt' => 'U naselju na obodu grada voda iz česme ne teče redovno već sedmu mesec zaredom. Nadležni obećavaju rešenje, meštani i dalje nose flaše iz grada.',
                'paras' => [
                    'Cisterna dolazi dva puta nedeljno, ali za domaćinstva sa malom decom i starijima to nije dovoljno. Meštani su više puta pisali komunalnom preduzeću.',
                    'Obišli smo naselje i zabeležili kako izgleda svakodnevica kada voda postane luksuz.',
                ],
            ],
            [
                'title' => 'Ko odlučuje o budžetu za kulturu i zašto to malo ko zna',
                'category' => 'Kultura',
                'author' => 'Marija Stanković',
                'days' => 3,
                'video' => null,
                'home' => false,
                'excerpt' => 'Svake godine grad izdvoji određen novac za kulturu. Kako se ta sredstva raspoređuju, po kojim kriterijumima i ko sedi u komisijama, pokušali smo da razjasnimo.',
                'paras' => [
                    'Dokumenta su javna, ali razbacana po nekoliko odluka i zapisnika. Sastavili smo ih na jedno mesto i pokušali da pratimo put novca.',
                    'Sagovornici iz nezavisne scene kažu da im najviše smeta nepredvidivost, a ne iznos. Bez jasnog kalendara konkursa teško je planirati sezonu.',
                ],
            ],
            [
                'title' => 'Jutro na niškoj pijaci, ljudi i cene pred praznik',
                'category' => 'Grad',
                'author' => 'd1 redakcija',
                'days' => 4,
                'video' => 'https://www.youtube.com/watch?v=ScMzIvxBSi4',
                'home' => false,
                'excerpt' => 'Otišli smo na pijacu pre svih, dok se tezge tek postavljaju, da vidimo sa čime prodavci i kupci dočekuju praznične dane.',
                'paras' => [
                    'Cene su više nego prošle godine, slažu se i prodavci i kupci. Ali pijaca ostaje mesto gde se, kažu, i dalje može pogađati.',
                    'Pet minuta jutra na pijaci, bez komentara, samo ljudi i tezge.',
                ],
            ],
            [
                'title' => 'Protest ispred Skupštine grada: šta traže građani',
                'category' => 'Društvo',
                'author' => 'Nikola Ilić',
                'days' => 5,
                'video' => 'https://www.youtube.com/watch?v=5qap5aO4i9A',
                'home' => false,
                'excerpt' => 'Nekoliko stotina ljudi okupilo se ispred Skupštine grada zbog najavljene izgradnje na mestu parka. Snimili smo skup od početka do kraja.',
                'paras' => [
                    'Organizatori traže obustavu radova i javnu raspravu. Iz gradske uprave poručuju da je projekat u skladu sa planom.',
                    'Prenosimo glasove sa protesta i reakcije prolaznika.',
                ],
            ],
            [
                'title' => 'Poslednji zanatlije u centru: priča o časovničaru iz sokaka',
                'category' => 'Priče',
                'author' => 'Marija Stanković',
                'days' => 6,
                'video' => 'https://www.youtube.com/watch?v=hHW1oY26kxQ',
                'home' => false,
                'excerpt' => 'U radnji koja se nije menjala pola veka, časovničar i dalje popravlja ono što drugi bacaju. Proveli smo dan sa njim.',
                'paras' => [
                    'Kaže da mušterija ima sve manje, ali da oni koji dođu ostaju verni. Popravka jednog sata ume da potraje danima.',
                    'Portret zanata koji polako nestaje iz gradskog centra.',
                ],
            ],
            [
                'title' => 'Festival uličnih svirača: cela noć u pet minuta',
                'category' => 'Kultura',
                'author' => 'Ana Petrović',
                'days' => 7,
                'video' => 'https://www.youtube.com/watch?v=e-ORhEE9VVg',
                'home' => false,
                'excerpt' => 'Ulice u centru te večeri pretvorile su se u binu. Saželi smo celu noć festivala u kratku video razglednicu.',
                'paras' => [
                    'Od klasične gitare do limenog orkestra, publika je birala gde će zastati. Najviše sveta okupilo se, kao i svake godine, kod glavne raskrsnice.',
                    'Pogledajte kako je izgledala festivalska noć.',
                ],
            ],
            [
                'title' => 'Niški polumaraton okupio rekordan broj trkača',
                'category' => 'Sport',
                'author' => 'd1 redakcija',
                'days' => 8,
                'video' => null,
                'home' => false,
                'excerpt' => 'Na startu se ove godine našlo više od hiljadu trkača, među njima i rekreativci koji trče prvi put. Staza je vodila kroz centar i pored reke.',
                'paras' => [
                    'Organizatori kažu da je interesovanje najveće do sada. Prijave su bile popunjene nedelju dana pre trke.',
                    'Beležimo atmosferu sa staze i utiske učesnika na cilju.',
                ],
            ],
        ];

        foreach ($posts as $data) {
            Post::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'body' => $body($data['paras']),
                    'category_id' => $cats[$data['category']]->id,
                    'author_name' => $data['author'],
                    'status' => 'published',
                    'published_at' => now()->subDays($data['days'])->setTime(8, 30),
                    'video_url' => $data['video'],
                    'show_on_home' => $data['home'],
                ],
            );
        }
    }
}
