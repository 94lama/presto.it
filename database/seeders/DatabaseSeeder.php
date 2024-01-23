<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\User::factory(10)->create();

        /* ///[Utenti] */
        /* Aggiungere nuovi utenti tramite array. La creazione è automatizzata nel foreach */
        
        $users=[
            // [name, email, password, is_revisor],
            ['Sara', 'sara@gmail.com', 'sara_writer', 0],
            ['Utente standard', 'user@presto.it', '123456789', 0],
            ['Riccardo', 'asd@asd.asd', '123456789', 1],
            ['Mattia', 'mattia@email.asd', '123456789', 1],
            ['Marco', 'marco@marco.marco', '123456789', 1],
            ['Marco', 'M4rK@gmail.com', 'ricordosicuro', 1],
            ['Michael', 'mike@mail.com', '123456789', 1],
        ];

        foreach($users as $user){
            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make($user[2]),
                'is_revisor' => $user[3],
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        }


        /* ///[Annunci] */
        /* $items = [
            // [title, body, price, category_id, user_id, is_accepted]
            ['Cucina lube completa', 'Ottime condizioni, grande affare', 1200, 5, 5, 1],
            [
                //https://www.amazon.it/Hagen-Bollitore-elettrico-cordless-HA5525-BLK-Nero/dp/B09V564HJL?ref_=Oct_d_onr_d_602474031_2&pd_rd_w=9F07y&content-id=amzn1.sym.e6438345-fc90-4c58-9ea8-eb69fd735f16&pf_rd_p=e6438345-fc90-4c58-9ea8-eb69fd735f16&pf_rd_r=3XTF5TYQF9P439Q65H2X&pd_rd_wg=AcBeG&pd_rd_r=c143e06f-67b3-4872-84f4-45410734fc28&pd_rd_i=B09V564HJL
                'Hagen - Acciaio inox - Bollitore elettrico - Bollitore cordless - Bollitore in acciaio inox - Bollitore elettrico 1,8L cordless in acciaio inox HAGEN HA5525-BLK-Nero',
                "Informazioni su questo articolo. Grande capacità: grazie alla sua grande capacità di 1,8 litri, è ideale per soddisfare il fabbisogno idrico quotidiano. La sua potenza di 1500 W porta ad ebollizione in modo rapido ed efficiente grazie all'interruttore on/off Sicurezza: sistema di protezione contro l'ebollizione a secco: se l'apparecchio è privo di acqua o se l'acqua è finita per errore, il sistema si disattiva automaticamente per evitare incidenti. Design pratico: la base a 360º consente di collocare il bollitore nella posizione desiderata e incorpora uno spazio per riporre il cavo. Filtro rimovibile e lavabile per garantire la purezza dell'acqua. Indicatore di livello dell'acqua e spia di accensione/spegnimento. Alta qualità: realizzato con componenti di alta qualità, tutti di grado alimentare e completamente privo di BPA (senza sostanze chimiche a base di bisfenolo A), è un prodotto ideale e sano per l'uso quotidiano. Garanzia di soddisfazione al 100%: non ci limitiamo a offrire prodotti di qualità, perché crediamo che un prodotto eccellente sia sempre accompagnato da un eccellente servizio clienti. Non esitate a contattarci per qualsiasi domanda, saremo felici di aiutarvi",
                14.90,
                4,
                5,
                1,
                1,
            ],

            [
                // https://www.amazon.it/homcom-Acciaio-Tessuto-Cuscini-Dimensione/dp/B0841G64XJ?ref_=Oct_d_omwf_d_2808731031_1&pd_rd_w=IMTJr&content-id=amzn1.sym.33aa4537-9a19-4018-9942-6e448fc50b59&pf_rd_p=33aa4537-9a19-4018-9942-6e448fc50b59&pf_rd_r=EZTT15CJC3AQXRJ6JMWM&pd_rd_wg=J2yzU&pd_rd_r=0f3f9c20-968e-41bd-a30b-bee330c06556&pd_rd_i=B0841G64XJ
                'homcom Divano Letto 2 Posti 1 Piazza ½ con 4 Cuscini in Acciaio e Tessuto Crema',
                "Informazioni su questo articolo. Pratico divano letto dal design moderno e multifunzionale. Da divano si trasforma facilmente in un spazioso letto ad una piazza e mezzo in pochi secondi. L'angolatura dello schienale è regolabile in 6 posizioni per adattarsi a qualsiasi esigenza. Materiale: Tessuto di poliestere composito, acciaio e spugna - Colore: Crema
                Dimensione del divano: 102 x 82 x 81cm - Dimensione del letto: 190 x 98 x 25cm - Carico massimo: 150Kg",
                415.95,
                4,
                9,
                1,
            ],
            [
                // https://www.amazon.it/ZUNTO-Portasciugamani-Autoadesivo-Porta-Salviette-Inossidabile/dp/B07Z97JN3Q?ref_=Oct_d_otopr_d_2808571031_10&pd_rd_w=NJBXN&content-id=amzn1.sym.09a08496-72f3-41ed-916f-4a1d91ea021d&pf_rd_p=09a08496-72f3-41ed-916f-4a1d91ea021d&pf_rd_r=QQSYQYGCX2WCW17XJ16F&pd_rd_wg=FzNea&pd_rd_r=40df55fe-9444-4544-936e-69adf75f4411&pd_rd_i=B07Z97JN3Q&th=1
                'ZUNTO Bagno Portasciugamani 40CM Autoadesivo Per Porta Salviette in Acciaio Inossidabile Porta Asciugamano',
                "Informazioni su questo articolo. Dimensioni: 40 cm di lunghezza, 7,5 cm di larghezza , 4,5 cm di altezza. Materiale: acciaio inossidabile SUS 304, impermeabile e antiruggine, il carico massimo è di 8 kg. Design: design elegante, porta asciugamani posizionati sulla parete liscia possono essere utilizzati per riporre asciugamani da bagno o asciugamani per gli ospiti, risparmiando spazio e pulizia. Praticità: i portasciugamani sono adatti per l'uso nei bagni di famiglia e nei bagni degli ospiti, nonché nei salotti della cucina. Installazione semplice: portasciugamani autoadesivo, privo di forature, basta staccare il cuscinetto autoadesivo dal retro del portasciugamani e incollarlo su una parete liscia, quindi premere per alcuni secondi. In caso di domande sui prodotti, non esitare a contattarci, ti forniremo un servizio post-vendita soddisfacente",
                23.99,
                1,
                9,
                1,
            ],
            [
                // https://www.amazon.it/Quaderno-taccuino-cosplay-Fashion-regali/dp/B096LVZ3L8/ref=sr_1_4?__mk_it_IT=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3H5OZPKQV78C&keywords=death+note&qid=1697227340&s=books&sprefix=death+n%2Cstripbooks%2C99&sr=1-4
                "Quaderno Death Note con penna piuma, taccuino cosplay Death Note a tema Fashion Anime, regali per gli amanti del cosplay, può essere usato come diario e taccuino",
                "Taccuino con note di morte: il miglior regalo per gli amanti del cosplay, può essere utilizzato come diario e quaderno? Con penna a piuma e collana a forma di L?. Taccuino alla moda a tema anime Death Note Cosplay Notebook New School Large Writing Journal. Materiale: ecopelle. Colore: come da immagine. Materiale della copertina del notebook: gomma. Dimensioni: 20,5 x 14,5 cm. Materiale penna: piuma.",
                16.9,
                5,
                11,
                1,
            ],
            [
                // https://www.amazon.it/Xiaomi-Indicatori-Pieghevole-Pneumatici-Energetico/dp/B0C3VZ8SH1/ref=sr_1_17?__mk_it_IT=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=12SA830XTUFJL&keywords=monopattino+elettrico&qid=1697492822&sprefix=monopattino+elettri%2Caps%2C112&sr=8-17&ufe=app_do%3Aamzn1.fos.9d4f9b77-768c-4a4e-94ad-33674c20ab35
                "Xiaomi Electric Scooter 4 Lite, Indicatori di Direzione Integrati, Pieghevole, Motore 300W, Autonomia 20km, Sistema Doppia Frenata, Pneumatici 8.5”, Recupero Energetico KERS, Controllo Xiaomi Home App",
                "Marchio: Xiaomi
                Colore: Nero
                Caratteristica speciale: Portatile
                Numero di ruote: 2
                Nome modello: Scooter 4 Lite
                Materiale ruota: Gomma
                Materiale della cornice: Metallo
                Peso articolo: 15,8 Chilogrammi
                Tipo manubrio: Fisso
                Dimensioni della ruota: 8,5 Pollici",
                329,
                3,
                3,
                1,
            ],
            [
                //https://www.amazon.it/Google-Pixel-Pro-Smartphone-teleobiettivo/dp/B0CGVVVDXW/ref=sr_1_2?__mk_it_IT=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3JF1O9WLWTB85&keywords=pixel&qid=1697492970&sprefix=pixe%2Caps%2C109&sr=8-2&ufe=app_do%3Aamzn1.fos.d4b79b69-7fa3-49d4-9d2a-f8ac4bab3f93
                "Google Pixel 8 Pro - Smartphone Android sbloccato con teleobiettivo, batteria con 24 ore di autonomia e display Super Actua - Nero ossidiana, 128GB",
                "Marchio: Google
                Nome modello: Pixel 8 Pro
                Carrier wireless: Sbloccato
                Sistema operativo: Android 14
                Tecnologia cellulare: 5G
                Capacità della memoria: 12 GB
                Tecnologia di connettività: Bluetooth, Wi-Fi, USB
                Colore: Nero ossidiana
                Dimensioni schermo: 6,7 Pollici
                Tecnologia della rete wireless: Wi-Fi",
                1098,
                6,
                4,
                null,
            ]
        ];

        foreach ($items as $item) {
            Announcement::create([
                'title' => $item[0],
                'body' => $item[1],
                'price' => $item[2],
                'user_id' => $item[3],
                'category_id' => $item[4],
                'is_accepted' => $item[5],
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        } */

    }
}
