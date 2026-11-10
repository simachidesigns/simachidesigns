<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Opening;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\User;
use App\Support\Site;
use Illuminate\Database\Seeder;

class AtmosphereSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@atmosphere.test'],
            ['name' => 'Studio Admin', 'password' => 'Atmosphere@2026']
        );

        foreach (Site::DEFAULTS as $key => $value) {
            Setting::put($key, $value);
        }

        $services = [
            ['offering', 'Design Solutions', 'design-solutions', 'Creative, functional spaces that carry a brand’s character into the room.', "Design at Atmosphere starts with the feeling a customer should have in the first ten seconds.\n\nWe move from concept and planning into a full design docket: layout, materials, lighting, and the small decisions that make a store feel inevitable. The work is visual, and it is also practical — circulation, storage, and the way staff actually use the floor."],
            ['offering', 'Design and Build', 'design-and-build', 'One team from the first sketch through handover.', "Design & Build keeps authorship intact. The people who draw the room also deliver it.\n\nPlanning, procurement, site works, and finishing stay coordinated, so the space that opens still matches the space that was promised. This is the path for brands that want a single partner rather than a chain of handoffs."],
            ['offering', 'Build Solutions', 'build-solutions', 'Precision execution when the design already exists.', "Bring us a resolved concept and we will build it with care for time, quality, and the life of the materials.\n\nSite coordination, finishing, and the unglamorous details are handled so the opening day feels calm. Every junction is checked, because a luxury room fails in the gaps."],
            ['offering', 'Design & Fixtures', 'design-and-fixtures', 'A design docket, then fixtures made to the last screw.', "Some brands need both the idea and the objects that hold it. We design the space and manufacture the fixtures in-house.\n\nDisplays, counters, and furniture are tuned to the brand rather than pulled from a catalogue. The result is a room where the joinery and the architecture agree."],
            ['offering', 'Fixtures & Furniture', 'fixtures-and-furniture', 'Premium pieces made against your existing drawings.', "When the design is already yours, the factory can still be ours.\n\nWe manufacture fixtures and furniture to your drawings, collaborating with your team on tolerances, finishes, and installation. The pieces are built to earn their place in the room, not merely fill it."],
            ['segment', 'Retail Solutions', 'retail-solutions', 'Apparel, jewellery, and lifestyle stores with a clear point of view.', "Retail at Atmosphere is about the pace of a visit: what someone sees, touches, and remembers.\n\nWe plan flagships and rollouts for fashion and lifestyle brands, including multi-city programmes where the idea has to survive more than one address."],
            ['segment', 'Workspace Solutions', 'workspace-solutions', 'Offices and co-working floors that feel as considered as a store.', "A workplace can carry a brand just as clearly as a shopfront.\n\nWe design and build offices, co-working rooms, and client-facing floors for companies that want focus, hospitality, and a material palette with a point of view."],
            ['segment', 'Hospitality Solutions', 'hospitality-solutions', 'Hotels, restaurants, and rooms arranged around welcome.', "Hospitality work is about temperature, light, and the way a table is approached.\n\nFrom dining rooms to hotel spaces, we shape environments that hold a culture — Japanese grill, coastal hotel, or a neighbourhood table — without turning it into a theme."],
        ];

        foreach ($services as $index => [$type, $title, $slug, $excerpt, $body]) {
            Service::query()->updateOrCreate(['slug' => $slug], [
                'type' => $type,
                'title' => $title,
                'excerpt' => $excerpt,
                'body' => $body,
                'sort_order' => $index + 1,
            ]);
        }

        $photos = [
            'apparel' => [
                'https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1469334031218-e382a71b716b?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1600&q=80',
            ],
            'jewellery' => [
                'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1601121141461-9d6647bca1ed?auto=format&fit=crop&w=1600&q=80',
            ],
            'fb' => [
                'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1600&q=80',
            ],
            'hospitality' => [
                'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80',
            ],
            'workspace' => [
                'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1600&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=80',
            ],
            'coworking' => [
                'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1600&q=80',
            ],
            'lifestyle' => [
                'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1600&q=80',
            ],
        ];
        $used = [];

        $projects = [
            ['Mukti & Kavith Casa Hyderabad', 'apparel', 'Hyderabad', 2024, true, 'A Hyderabad fashion house arranged as a sequence of quiet rooms rather than a single sales floor.', 'Casa is planned as a house: slower rooms, softer light, and displays that let embroidery be the loudest thing in the space. Circulation keeps ceremony for bridal appointments and ease for everyday browsing.'],
            ['Kora by NM', 'apparel', 'Mumbai', 2024, true, 'A Mumbai apparel interior edited down to material, proportion, and a clear path through the collection.', 'Kora uses a restrained palette so the clothes hold the colour. Fixtures are low and precise, with enough negative space that a single look can occupy the room.'],
            ['Kalki Fashion Vadodara', 'apparel', 'Vadodara', 2024, true, 'One of the Kalki stores shaped to make a visit feel personal, part of a multi-city rollout.', 'The Vadodara floor balances bridal drama with a calmer edit. Seating, light, and private corners are planned so an appointment can last without the room feeling crowded.'],
            ['Adamantine', 'jewellery', 'Mumbai', 2023, true, 'A jewellery room where light, cases, and pause are the design.', 'Cases sit at a height that invites a closer look. The palette stays dark and warm so metal and stone do the talking, and the journey from entrance to private viewing is deliberate.'],
            ['Robata Kuuraku', 'fb', 'Mumbai', 2025, true, 'A dining room at Phoenix Palladium that treats Japanese hospitality as architecture, not decoration.', 'At Gourmet Village, Robata Kuuraku is planned as a cultural conversation: the grill, the counter, and the pace of service all shape the room. Materials stay honest, and the light is set for an evening rather than a food-court afternoon.'],
            ['Cielo', 'apparel', 'Mumbai', 2023, false, 'A light-filled apparel interior with a soft, sky-led palette.', 'Cielo keeps the shell bright and the fixtures fine, so volume and fabric read clearly from the entrance.'],
            ['Akoirah', 'jewellery', 'Mumbai', 2024, false, 'A jewellery environment tuned for ceremony and close looking.', 'The plan gives each collection a distinct pause, with cases and lighting designed around how a piece is actually shown.'],
            ['Everlume Lab-Grown Diamonds', 'jewellery', 'Mumbai', 2024, false, 'A contemporary diamond studio with a cleaner, brighter retail language.', 'Everlume steps away from traditional vault theatrics. The room is lucid, technical, and still generous — a place to understand a stone as much as desire it.'],
            ['Arnika – Khimji Dayabhai Group', 'jewellery', 'Mumbai', 2023, false, 'A heritage jewellery house given a room that respects lineage and current retail pace.', 'Arnika holds family craft in a plan that still works for a modern visit: clear stories, considered cases, and a private edge for serious appointments.'],
            ['Perona', 'apparel', 'Mumbai', 2023, false, 'An apparel store edited around proportion, fabric, and an unhurried loop.', 'Perona’s floor lets outfits breathe. The joinery is quiet, and the path brings people back to a look they almost missed.'],
            ['Kalki Fashion Kalaghoda', 'apparel', 'Mumbai', 2024, false, 'A Fort address for Kalki, scaled to a tighter, more urban room.', 'Kalaghoda compresses the bridal experience without losing ceremony. Light and texture do the work that a larger floor would do with distance.'],
            ['Solitario Diamonds', 'jewellery', 'Mumbai', 2023, false, 'A diamond retail space built around clarity, both optical and spatial.', 'Solitario uses precise lighting and a short, confident plan. Nothing competes with the stone.'],
            ['Kushal’s Fashion Jewellery', 'jewellery', 'Bengaluru', 2023, false, 'Fashion jewellery presented with the discipline of a fine-jewellery room.', 'The fixtures keep high volume shoppable while the materials lift the perception of the product.'],
            ['The Orchid Passaros, Goa', 'hospitality', 'Goa', 2022, false, 'A Goa hotel interior shaped by air, shade, and a slower arrival.', 'Passaros treats the threshold as part of the stay. Materials are chosen for heat, salt air, and the way afternoon light moves.'],
            ['Living Liquidz', 'fb', 'Mumbai', 2023, false, 'A drinks-led interior with a bar that behaves like a stage.', 'The plan puts the bottle wall and the counter in conversation, with seating that can be intimate or social depending on the hour.'],
            ['House of Churros', 'fb', 'Mumbai', 2023, false, 'A compact food interior with a clear counter ritual.', 'The room is small on purpose. Sightlines, queue, and the scent of the pass are designed as one sequence.'],
            ['Maersk', 'workspace', 'Mumbai', 2022, false, 'A workplace for a global shipping house, calm enough for focus and formal enough for clients.', 'The floor balances open work with rooms for concentration. Materials are marine in spirit without becoming literal.'],
            ['TCS House', 'workspace', 'Mumbai', 2022, false, 'A client-facing workplace with a measured, institutional confidence.', 'Circulation, meeting rooms, and the arrival sequence are planned so a large organisation still feels personally hosted.'],
            ['Redbrick Offices', 'coworking', 'Mumbai', 2023, false, 'Co-working rooms that feel furnished, not temporary.', 'Redbrick uses joinery and light to give members a sense of address, with shared rooms that can hold a meeting or a quiet hour.'],
            ['Aza Fashion', 'lifestyle', 'Mumbai', 2023, false, 'A fashion destination arranged as a series of edited galleries.', 'Aza’s rooms change temperature as the collection changes. The architecture stays consistent so the clothes can be the event.'],
        ];

        foreach ($projects as $index => [$title, $category, $city, $year, $featured, $summary, $body]) {
            $pool = $photos[$category];
            $image = $pool[$used[$category] ?? 0] ?? $pool[0];
            $used[$category] = (($used[$category] ?? 0) + 1) % count($pool);

            Project::query()->updateOrCreate(['slug' => \Illuminate\Support\Str::slug($title)], [
                'title' => $title,
                'category' => $category,
                'city' => $city,
                'year' => $year,
                'summary' => $summary,
                'body' => $body,
                'image' => $image,
                'featured' => $featured,
                'sort_order' => $index + 1,
            ]);
        }

        $articles = [
            ['Robata Kuuraku: a cultural dialogue in space', 'robata-kuuraku-a-cultural-dialogue', '2025-09-10', 'At Phoenix Palladium’s Gourmet Village, a Japanese grill becomes a room about hospitality rather than costume.', 'https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=1600&q=80', "Robata Kuuraku unfolds as a cultural experience shaped by Japanese traditions of welcome and retuned for Mumbai.\n\nThe counter, the grill, and the path a guest takes from the mall corridor into a quieter room are the design. Atmosphere treated the project as a conversation between craft and contemporary dining, not a set of imported symbols."],
            ['Jewellery retail is evolving', 'jewellery-retail-is-evolving', '2025-06-12', 'From ceremonial flagships to sharper concept stores, jewellery rooms are being asked to mean more.', 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=1600&q=80', "India’s jewellery floor is shifting. Stately stores still matter, and so do lighter concept rooms where a younger client wants to understand the piece in their hand.\n\nAtmosphere’s work in this segment treats the case, the light, and the private appointment as one system. The store has to feel precious without feeling locked."],
            ['Blueprint of brilliance', 'blueprint-of-brilliance', '2025-03-04', 'How a Mumbai design-and-build studio built its reputation on retail rooms that hold up after opening week.', 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&q=80', "Atmosphere’s reputation sits on a simple loop: design with intent, make what the design needs, and stay through delivery.\n\nThe factory in Bhiwandi is not a separate story from the studio in Parel. Fixtures, furniture, and the room are authored together, which is why the finished stores still resemble the drawings."],
            ['The crafting of Kalki’s immersive stores', 'crafting-kalki-stores', '2024-11-18', 'Ethnic fashion, four cities, and a six-month programme of rooms meant to make a customer feel looked after.', 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1600&q=80', "Kalki needed stores that felt exclusive without feeling distant. Atmosphere translated that brief into immersive floors delivered across cities in six months.\n\nThe repetition was not a copy-paste. Each address kept the brand’s ceremony and adjusted to the size, light, and habits of its street."],
        ];

        foreach ($articles as [$title, $slug, $date, $excerpt, $image, $body]) {
            Article::query()->updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'excerpt' => $excerpt,
                'body' => $body,
                'image' => $image,
                'published_on' => $date,
            ]);
        }

        $openings = [
            ['Billing Engineer', 'billing-engineer', 'Design & Client Servicing', 'Prepare and defend the numbers that keep a fit-out honest.', "Prepare, verify, and process contractor and client bills.\nMeasure quantities from drawings and from site.\nTrack project cost against the budget.\nRun rate analysis for materials and works.\nKeep measurement and billing records accurate.\nCoordinate with project managers, contractors, and accounts.", 'Strong quantity surveying instincts, comfort with billing software, and a careful eye.'],
            ['Procurement and Contracts Head', 'procurement-and-contracts-head', 'Manufacturing', 'Own the buying and the contracts that make a project possible.', "Set procurement strategy against the studio’s goals.\nFind, judge, and manage suppliers on quality, cost, and time.\nNegotiate and look after contracts with suppliers and subcontractors.\nWatch cost so the project stays healthy.\nKeep the work inside company policy and the law.", 'Eight or more years in procurement and contracts, ideally in interiors or construction. Clear negotiation and a calm head for risk.'],
            ['Assistant Manager – Cost & Estimation', 'assistant-manager-cost-estimation', 'Design & Client Servicing', 'Support the estimates that decide whether a drawing can be built well.', "Help build and manage project estimates and budgets.\nTake off quantities, test costs, and name the risks.\nWork with project teams when a number starts to drift.\nRead cost performance and point to what should change.\nStay inside the studio’s financial rules.", 'A degree in quantity surveying, construction management, or a close field, with five or more years in cost control for fit-out or construction.'],
            ['Sr. Manager – Quantity Surveyor', 'senior-quantity-surveyor', 'HR & Admin', 'Lead the people who keep budgets and quantities truthful.', "Guide the quantity surveying and budgeting team.\nOwn project budgets from first estimate to final account.\nRun take-offs, cost reviews, and risk checks.\nSit with project teams before a small gap becomes an expensive one.\nHold the work to company financial policy.", 'A relevant degree and ten or more years in quantity surveying, with the patience to teach and the precision to sign a number.'],
        ];

        foreach ($openings as [$title, $slug, $department, $summary, $responsibilities, $qualifications]) {
            Opening::query()->updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'department' => $department,
                'summary' => $summary,
                'responsibilities' => $responsibilities,
                'qualifications' => $qualifications,
                'is_open' => true,
            ]);
        }

        $clients = ['TUMI', 'MUJI', 'Perona', 'Kalki', 'Hamleys', 'Maersk', 'Aza', 'Solitario'];
        foreach ($clients as $index => $name) {
            Client::query()->updateOrCreate(['name' => $name], ['sort_order' => $index + 1]);
        }

        $faqs = [
            ['Can you take design only, or build only?', 'Both. Some partners want a full design-and-build path. Others arrive with drawings and need fixtures, furniture, or site delivery. The five service lines exist so the scope can match the brief.'],
            ['Where do you work?', 'The studio is in Parel, Mumbai, with a factory in Bhiwandi and work delivered in India and Dubai. Multi-city retail programmes are part of the practice.'],
            ['Do you manufacture what you design?', 'Yes. The Bhiwandi factory builds fixtures and furniture, including work made against a client’s own drawings.'],
            ['How does a project usually start?', 'With a conversation: the brand, the address, the timeline, and the feeling the room should leave behind. From there we propose the right depth of partnership.'],
            ['Who supervises the site?', 'The same studio stays close to delivery — coordinating detail, builders, and the factory — so the opened room still matches the intent.'],
        ];
        foreach ($faqs as $index => [$question, $answer]) {
            Faq::query()->updateOrCreate(['question' => $question], ['answer' => $answer, 'sort_order' => $index + 1]);
        }

        TeamMember::query()->updateOrCreate(['name' => 'Nilesh Mohan Rathod'], [
            'role' => 'Founder & CEO',
            'bio' => "Nilesh Rathod is an entrepreneur with a B.Com and CFA who has built businesses in design-and-build and commercial interiors, including EIIL and EFFL. He leads Atmosphere from Mumbai.\n\nHe is also a novelist — Destiny of Shattered Dreams was published in 2018. He lives in Mumbai with his wife Preeti and their sons Shloak and Parv.",
            'sort_order' => 1,
        ]);
    }
}
