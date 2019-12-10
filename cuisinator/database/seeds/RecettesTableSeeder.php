<?php

use Illuminate\Database\Seeder;
use App\Recette;

class RecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = new Recette();
        $r1->nom = 'Guacamole';
        $r1->description = 'Le guacamole accompagne parfaitement chips, nachos ou biscuits salés. Laissez le noyau dans le guacamole pour le conserver plus longtemps ! ';
        $r1->nom_photo = 'guacamole.jpg';
        $r1->id_createur = 1;
        $r1->steps = '1. Ecrasez les avocats à l\'aide d\'une fourchette.\n2. Mélangez les ingrédients.\n3. Savourez!';
        $r1->save();

        $r2 = new Recette();
        $r2->nom = 'Pain';
        $r2->description = 'Recette de pain';
        $r2->nom_photo = '79995_w420h344c1cx1944cy2592cxt0cyt0cxb3888cyb5184.jpg';
        $r2->id_createur = 1;
        $r2->steps = '1. Mélangez la farine, l\'huile d\'olive, le sachet de levure, le sel et ajoutez l\'eau. Malaxez jusqu\'à l\'obstention d\'une pâte homogène. Le geste est important: faites comme si vous étiez en train de plier un mouchoir avec la pâte.\n2. Attention la pâte ne doit pas coller à la paroi! Rajoutez de la farine si elle colle, ou de l\'eau si elle est trop sèche.\n3.Prenez un moule à cake et tapissez de papier cuisson, mettez le pain, faites les croisillons avec un couteau pointu.\n4. Prenez un torchon propre, mouillez-le et mettez-le sur le pain.\n5. Attendez une heure que la pâte soit levée.\nPendant ce temps-là, préchauffez le four à thermostat 7 ou à 220°C pendant 20 mn environ.\nEnfournez pendant 40 mn.';
        $r2->save();

        $r3 = new Recette();
        $r3->nom = 'Velouté de potiron et carotte';
        $r3->description = 'Peut-être servi avec des croûtons. Ce velouté fait unanimité même par les plus sceptiques vis à vis du potiron.';
        $r3->nom_photo = 'guacamole.jpg';
        $r3->id_createur = 1;
        $r3->steps = '1. Éplucher et couper en dés le potiron, les pommes de terre, les carottes en rondelles.\n2. Emincer l\'ail et l\'oignon.\n3. Faire suer l\'oignon dans l\'huile d\'olive.\n4. Ajouter tous les légumes et l\'ail puis verser le bouillon et le lait.\n5. Saler, poivrer, "muscader" et laisser cuire environ une trentaine de minutes.\n6. Mixer le tout (ajouter éventuellement la crème) et rectifier l\'assaisonnement si nécessaire.\n7. Bon appétit !';
        $r3->save();
        
        $r4 = new Recette();
        $r4->nom = 'Gâteau au chocolat des écoliers';
        $r4->description = 'Vous pouvez réaliser votre gâteau dans un moule à cake. Dans ce cas, le temps de cuisson sera de 45 minutes. Il se marie très bien avec de la crème anglaise! Faites attention à la cuisson! Vous laisserez le gâteau moins longtemps si vous voulez un vrai fondant au chocolat. ';
        $r4->nom_photo = 'gateau_choco.jpg';
        $r4->id_createur = 1;
        $r4->steps = '1. Préchauffez le four à 180°C (thermostat 6).\n2. Faites fondre le chocolat au bain-marie ou au micro-ondes. Si vous le faites fondre au micro-ondes, ajoutez 3 cuillères à soupe d\'eau pour 200 g de chocolat.\n3. Ajoutez le beurre au chocolat fondu et fouetter énergiquement jusqu\'à ce que le mélange soit lisse et bien fondu.\n4. Dans un saladier, fouettez les oeufs et le sucre jusqu\'à ce que le mélange blanchisse et incorporez la levure puis la farine.\n5. Versez le chocolat et le beurre fondus dans la préparation puis mélangez jusqu\'à l\'obtention d\'une pâte homogène.\n6. Versez la préparation dans un moule à manqué beurré et fariné.\n7. Faites cuire environ 25 minutes (adaptez le temps de cuisson pour obtenir un cœur plus ou moins fondant).';
        $r4->save();

        $r5 = new Recette();
        $r5->nom = 'Spaghetti Carbonara';
        $r5->description = 'La véritable recette des spaghetti carbonara';
        $r5->nom_photo = 'carbo.jpg';
        $r5->id_createur = 1;
        $r5->steps = '1. Dans une casserole mettre env. 4 l d’eau à bouillir. Une fois l’eau en ébullition, ajouter 30 g de sel (moins de 10 g par litre car le guanciale et le pecorino sont déjà assez salés) et plongez-y les pâtes.\n2. En même temps, dans un poêle, faites revenir le guanciale avec un tout petit peu d’huile d’olive vierge extra.\n3. Dans un bol, mélangez les oeufs, le pecorino et le poivre jusqu’à l’obtention d’une crème bien onctueuse.\n4. Une fois les pâtes cuites, versez les dans la poêle avec le guanciale et un peu d’eau de cuisson. Faites sauter le tout pendant quelques secondes puis éteignez le feu. Ajoutez les oeufs et le pecorino et mélangez le tout. Parsemez de pecorino et n’attendez pas à servir après avoir moulu encore un peu de poivre noir.';
        $r5->save();
    }
}
