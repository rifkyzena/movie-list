<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors = [
            [
                'name' => 'Ansel Elgort',
                'gender' => 'Male',
                'biography' => "Ansel Elgort is an American actor, known for playing Augustus Waters in the romance The Fault in Our Stars (2014) and the title character in the action thriller Baby Driver (2017). He was born in New York City to photographer Arthur Elgort and opera director Grethe Holby. His father is of Russian-Jewish heritage, while his mother has Norwegian and British Isles ancestry. Ansel played the title role in Baby Driver (2017), director Edgar Wright's action film, starring opposite Lily James and Kevin Spacey. Baby Driver was critically acclaimed, and emerged as a box office hit in the summer of 2017. Ansel also starred in the 2017 book adaptation November Criminals (2017), a crime thriller. His upcoming roles include the indie films Jonathan, Billionaire Boys Club (2018), and The Goldfinch (2019).",
                'date_of_birth' => '1994-03-14',
                'place_of_birth' => 'New York City, USA',
                'image_url' => 'actors/ansel-elgort.jpg',
                'popularity' => '63.22'
            ],
            [
                'name' => 'Lily James',
                'gender' => 'Female',
                'biography' => "Lily James was born Lily Chloe Ninette Thomson in Esher, Surrey, to Ninette (Mantle), an actress, and Jamie Thomson, an actor and musician. Her grandmother, Helen Horton, was an American actress. She began her education at Arts Educational School in Tring and subsequently went on to study acting at the Guildhall School of Music and Drama in London, graduating in 2010. It was in 2015 that James captured her biggest and most financially successful film to date, playing the titular role in Disney's fantasy drama Cinderella (2015), opposite Cate Blanchett and directed by Kenneth Branagh. The film was a smash hit at the box office, earning over $540 million worldwide and becoming the twelfth highest-grossing movie of the year.",
                'date_of_birth' => '1989-04-05',
                'place_of_birth' => 'Esher, Surrey, UK',
                'image_url' => 'actors/lily-james.jpg',
                'popularity' => '59.37'
            ],
            [
                'name' => 'Kevin Spacey',
                'gender' => 'Male',
                'biography' => "Kevin Spacey Fowler, better known by his stage name Kevin Spacey, is an American actor of screen and stage, film director, producer, screenwriter and singer. He began his career as a stage actor during the 1980s before obtaining supporting roles in film and television. He gained critical acclaim in the early 1990s that culminated in his first Academy Award for Best Supporting Actor for the neo-noir crime thriller The Usual Suspects (1995), and an Academy Award for Best Actor for midlife crisis-themed drama American Beauty (1999). In 2013, Spacey took on the lead role in an original Netflix series, House of Cards (2013). Based upon a British show of the same name, House of Cards is an American political drama. The show's first season received a Primetime Emmy Award nomination to include Outstanding lead actor in a drama series. In 2017, he played a memorable role as a villain in the action thriller Baby Driver (2017).",
                'date_of_birth' => '1959-07-26',
                'place_of_birth' => 'South Orange, New Jersey, USA',
                'image_url' => 'actors/kevin-spacey.jpg',
                'popularity' => '63.22'
            ],
            [
                'name' => 'Viggo Mortensen',
                'gender' => 'Male',
                'biography' => "Mortensen was born in New York City, to Grace Gamble (Atkinson) and Viggo Peter Mortensen, Sr. His father was Danish, his mother was American, and his maternal grandfather was Canadian. His parents met in Norway. They wed and moved to New York, where Viggo, Jr. was born, before moving to South America, where Viggo, Sr. managed chicken farms and ranches in Venezuela and Argentina. Two more sons were born, Charles and Walter, before the marriage grew increasingly unhappy. When Viggo was seven, his parents sent him to a a strict boarding school, isolated in the foothills of the mountains of Argentina. Then, at age eleven, his parents divorced. His mother moved herself and the children back to her home state of New York. Critics have continually recognized his work in over thirty movies, including such diverse projects as Jane Campion's The Portrait of a Lady (1996), Sean Penn's The Indian Runner (1991), Brian De Palma's Carlito's Way (1993), Ridley Scott's G.I. Jane (1997), Tony Scott's Crimson Tide (1995), Andrew Davis's A Perfect Murder (1998), Ray Loriga's La pistola de mi hermano (1997), Tony Goldwyn's A Walk on the Moon (1999), and Peter Farrelly's Green Book (2018).",
                'date_of_birth' => '1958-10-20',
                'place_of_birth' => 'Watertown, New York, USA',
                'image_url' => 'actors/viggo-mortensen.jpg',
                'popularity' => '46.05'
            ],
            [
                'name' => 'Mahershala Ali',
                'gender' => 'Male',
                'biography' => "Mahershala Ali is fast becoming one of the freshest and most in-demand faces in Hollywood with his extraordinarily diverse skill set and wide-ranging background in film, television, and theater. He can be seen in the independent feature film, Moonlight, as well as reprising his role in The Hunger Games: Mockingjay - Part 2, Gary Ross's civil war era drama The Free State of Jones, and Netflix's award-winning series House of Cards as well as Marvel's Luke Cage. On the stage, Ali appeared in productions of Blues for an Alabama Sky, The School for Scandal, A Lie of the Mind, A Doll's House, Monkey in the Middle, The Merchant of Venice, The New Place and Secret Injury, Secret Revenge. His additional stage credits include appearing in Washington, D.C. at the Arena Stage in the title role of The Great White Hope, and in The Long Walk and Jack and Jill. In February 2016, Ali made his New York Broadway debut in Kenny Leon's Smart People.",
                'date_of_birth' => '1974-02-16',
                'place_of_birth' => 'Oakland, California, USA',
                'image_url' => 'actors/mahershala.jpg',
                'popularity' => '62.55'
            ],
            [
                'name' => 'Linda Cardellini',
                'gender' => 'Female',
                'biography' => "Linda Edna Cardellini was born in Redwood City, California, to Lorraine (Hernan) and Wayne David Cardellini, a businessman. She is of Italian (from her paternal grandfather), Irish (from her mother), German, English, and Scottish descent. Linda grew up in the San Francisco Bay area, California, the youngest of four children. She became interested in acting at age ten, when she performed a singing role in a school Christmas play. She continued to do school productions and community theater. Cardellini captured the hearts of young girls, boys and teenagers, worldwide, for her portrayal of Velma in Warner Bros.'s Scooby-Doo (2002). She also co-starred in 'Brian Robbins'' Good Burger (1997), Legally Blonde (2001), with Reese Witherspoon, and Tom McLoughlin's The Unsaid (2001) with Andy Garcia, as well as in the Adam Sandler-produced comedy, Grandma's Boy (2006). Linda has a Bachelor of Arts degree in Theatre from Loyola Marymount University, and completed a summer study program at the National Theatre in London. She resides in Los Angeles.",
                'date_of_birth' => '1975-06-25',
                'place_of_birth' => 'Redwood City, California, USA',
                'image_url' => 'actors/linda-cardellini.jpg',
                'popularity' => '58.41'
            ],
            [
                'name' => 'Jovan Adepo',
                'gender' => 'Male',
                'biography' => "Jovan Adepo is a British-born American film and TV actor of Nigerian and African-American descent. He is best known for his performance in the HBO series ‘The Leftovers’ and the Denzel Washington directed film ‘Fences.’ Born in Oxfordshire, England, he grew up in Waldorf, Maryland, and later obtained a Bachelor’s degree in political science from ‘Bowie State University.’ With an aim to become a writer, Adepo moved to Los Angeles, where he joined acting classes to procure work in commercials. He slowly became interested in acting and decided to take it up as his profession. A church-goer from back home Maryland introduced him to her sister, Viola Davis, who provided guidance as his mentor. His first major role was as ‘Michael Murphy’ in the HBO supernatural mystery drama series ‘The Leftovers.’ His debut film, ‘Fences,’ in which he portrayed ‘Cory Maxson,’ fetched him award nominations. Adepo has appeared in films ‘Mother!’ and ‘Overlord’ as well as TV series, including ‘Jack Ryan,’ ‘Sorry For Your Loss,’ and ‘When They See Us.’",
                'date_of_birth' => '1988-09-06',
                'place_of_birth' => 'Upper Heyford, Oxfrodshire, UK',
                'image_url' => 'actors/jovan-adepo.jpg',
                'popularity' => '32.40'
            ],
            [
                'name' => 'Wyatt Russell',
                'gender' => 'Male',
                'biography' => "Wyatt Russell is an American actor and a former professional ice hockey player. Although he was born into a family of famous actors, Russell was inclined toward hockey since childhood. He played professional ice hockey for many years, till an injury forced him to quit the game. He made appearances in movies, too, in his early years. After his exit from hockey, Russell concentrated on making a full-fledged career in acting. He has been part of several movies such as ‘22 Jump Street’ and ‘This Is 40.’ Russell portrayed Corporal Lewis Ford in Julius Avery's 2018 horror film Overlord, Dud in AMC's Lodge 49 and John Walker in the Marvel Cinematic Universe Disney+ series The Falcon and the Winter Soldier (2021). Russell was born on July 10, 1986, in Los Angeles, California, to actors Kurt Russell and Goldie Hawn. He is a grandson of actor Bing Russell, and a half-brother of actors Oliver Hudson and Kate Hudson. He is of German, English, Scottish, Irish; and Hungarian-Jewish descent (from his maternal grandmother).",
                'date_of_birth' => '1986-07-10',
                'place_of_birth' => 'Los Angeles, California, USA',
                'image_url' => 'actors/wyatt-russell.jpeg',
                'popularity' => '58.41'
            ],
            [
                'name' => 'Pilou Asbaek',
                'gender' => 'Male',
                'biography' => "Pilou Asbæk graduated from The Danish National School of Performing Arts in 2008. In the same year, he played the leading role in Niels Arden Oplev's drama Worlds Apart. In 2010 he had his breakthrough as the inmate Rune in Lindholm & Noer's prison drama R for which he won the prize for Best actor at The Danish Critic Association Award, Bodil, and at the Danish Film Academy Awards, Robert. Furthermore, he was pointed as Shooting Star at the Berlinale in 2011 for this performance; an honor that is given to ten European Actors. Also, for three years he starred in the BAFTA winning and critically acclaimed television series Borgen as Kasper Juul; spin doctor for the Danish Prime Minister. The following years Pilou played the leading role in Tobias Lindholm's A Hijacking and A War. A War was nominated in the category Best Foreign Language Film at the Academy Awards 2015. In 2014, Pilou shot Luc-Besson's LUCY starring Scarlett Johansson and Morgan Freeman, and this year he played Pontius Pilate in Timur Bekmambetov's BEN-HUR. In 2017 he again played opposite Scarlett Johansson in Rupert Sander's Ghost in the Shell as Batou. Pilou has starred as Euron Greyjoy in the 6th and 7th seasons of HBO's acclaimed series Game of Thrones.",
                'date_of_birth' => '1982-03-02',
                'place_of_birth' => 'Copenhagen, Denmark',
                'image_url' => 'actors/pilou-asbaek.jpg',
                'popularity' => '43.91'
            ],
            [
                'name' => 'Will Ferrell',
                'gender' => 'Male',
                'biography' => "John William Ferrell was a graduate of the University of Southern California, Ferrell became interested in performing while a student at University High School in Irvine, where he made his school's daily morning announcements over the public address system in disguised voices. He started as a member of the Los Angeles comedy/improvisation group The Groundlings, where fellow cast members Ana Gasteyer, Maya Rudolph and former Saturday Night Live (1975) repertory players such as Laraine Newman, Jon Lovitz and Phil Hartman began their careers. It was there he met Chris Kattan and the two became good friends and both went on to Saturday Night Live (1975) later. He has also appeared on several television programs, including Strangers with Candy (1999), Grace Under Fire (1993) and Living Single (1993) during his time at The Groundlings. Will also lent his voice to the armless and legless dad of cartoon family 'The Oblongs'. In 1995 he became a feature cast member at Saturday Night Live (1975) during the show's rapid re-casting. He was declared quite possibly the worst cast member ever during his first season. However, his talents of impersonations and range of characters shot him forward to making him arguably the greatest Saturday Night Live (1975) cast member ever. During his seven year run he is one of the few cast members to ever be nominated for an Emmy for a performance and played George W. Bush during the 2000 elections. He has appeared in every Saturday Night Live (1975) movie since his premiere on the show in 1995. In 2002 he left Saturday Night Live (1975) and was the only cast member to ever receive a farewell from all the current cast members at the end of the season finale show. Since leaving the show Will has pursued a career in films. In 2000, he married Viveca Paulin, and lives in L.A.",
                'date_of_birth' => '1967-07-16',
                'place_of_birth' => 'Irvine, California, USA',
                'image_url' => 'actors/will-ferrell.jpg',
                'popularity' => '53.03'
            ],
            [
                'name' => 'Ryan Reynolds',
                'gender' => 'Male',
                'biography' => "Ryan Rodney Reynolds was born on October 23, 1976 in Vancouver, British Columbia, Canada, the youngest of four children. His father, James Chester Reynolds, was a food wholesaler, and his mother, Tamara Lee 'Tammy' (Stewart), worked as a retail-store saleswoman. He has Irish and Scottish ancestry. Between 1991-93, Ryan appeared in Hillside (1990), a Nickleodeon series taped in Florida with many other Canadian actors. After the series ended, he returned to Vancouver where he played in a series of forgettable television movies. He did small roles in Glenn Close's Serving in Silence: The Margarethe Cammermeyer Story (1995) and CBS's update of In Cold Blood (1996). However, his run of luck had led him to decide to quit acting. One night, he ran into fellow Vancouver actor and native Chris William Martin. Martin found Ryan rather despondent and told him to pack everything: they were going to head to Los Angeles, California. The two stayed in a cheap Los Angeles motel. On the first night of their stay, Reynolds' jeep was rolled downhill and stripped. For the next four months, Ryan drove it without doors. In 1997, he landed the role of Berg in Two Guys, a Girl and a Pizza Place (1998). Initially, the show was reviled by critics and seemed desperate for any type of ratings success. However, it was renewed for a second season but with a provision for a makeover by former Roseanne (1988) writer Kevin Abbott. The show became a minor success and has led to additional film roles for Ryan, most notably in the last-ever MGM film, a remake of The Amityville Horror (2005). Ryan was engaged to Canadian singer-songwriter Alanis Morissette, another Nickelodeon veteran, between 2004-2006. He has been married to Blake Lively since September 9, 2012. They have three daughters. He was previously married to Scarlett Johansson.",
                'date_of_birth' => '1976-10-23',
                'place_of_birth' => 'Vancouver, British Colombia, USA',
                'image_url' => 'actors/ryan-reynolds.jpg',
                'popularity' => '75.42'
            ],
            [
                'name' => 'Octavia Spencer',
                'gender' => 'Female',
                'biography' => "Spencer is a native of Montgomery, Alabama, which she claims is the proverbial buckle of the Bible belt. She's the sixth of seven siblings and holds a BS in Liberal Arts from Auburn University. A 'closet' lover of acting, this practical Alabamian knew that she'd someday work in the film industry, but never dreamed it would be in front of the camera. In 1995, acclaimed director Joel Schumacher changed all that by giving her a small part opposite Sandra Bullock in the hit film A Time to Kill, and Spencer was on her way. In 1996, she teamed up with Bullock again in Bullock's directorial debut of Making Sandwiches, a short film that premiered at the 1997 Sundance Film Festival.Spencer made her stage debut in Los Angeles and originated the role of 'LaSonia' (pronounced lasagna) in famed writer/director Del Shore's, The Trials and Tribulations of a Trailer Trash Housewife, starring opposite veteran actors Beth Grant, Dale Dickey and David Steen (2003). The play garnered Spencer and her fellow cast mates critical acclaim and a bevy of awards. Since then, Spencer has continued to see success as an actor in both film and television, working alongside Hollywood's elite. In February 2009, she was lauded by Los Angeles Times publication: The Envelope, for her brief but memorable performance in the Will Smith drama Seven Pounds.",
                'date_of_birth' => '1970-04-25',
                'place_of_birth' => 'Montgomery, Alabama, USA',
                'image_url' => 'actors/octavia-spencer.jpg',
                'popularity' => '47.89'
            ],
            [
                'name' => 'Ben Stiller',
                'gender' => 'Male',
                'biography' => "Benjamin Edward Meara Stiller was born on November 30, 1965, in New York City, New York, to legendary comedians Jerry Stiller and Anne Meara. Stiller made his big screen debut in Steven Spielberg's Empire of the Sun (1987) in 1987. Demonstrating early on the multifaceted tone his career would take, he soon stepped behind the camera to direct Back to Brooklyn for MTV. The network was impressed and gave Stiller his own show, The Ben Stiller Show (1992). He recruited fellow offbeat comedians Janeane Garofalo and Andy Dick and created a bitingly satirical show. MTV ended up passing on it, but it was picked up by Fox. Unfortunately, the show was a ratings miss. Stiller was soon out of work, although he did have the satisfaction of picking up an Emmy for the show after its cancellation. For a while, Stiller had to settle for guest appearance work. While doing this, he saved up his cash and in the end was able to scrape enough together to make Reality Bites (1994), now a cult classic which is looked upon favorably by the generation it depicted. Ben continued to work steadily for a time, particularly in independent productions where he was more at ease. However, he never quite managed to catch a big break. His first big budget directing job was Jim Carrey's The Cable Guy (1996). Although many critics were impressed, Jim Carrey's fans were not. In 1998, There's Something About Mary (1998) had propelled Stiller into the mainstream spotlight. He also starred in such hit movies as Keeping the Faith (2000) and Meet the Parents (2000).",
                'date_of_birth' => '1965-11-30',
                'place_of_birth' => 'New York City, USA',
                'image_url' => 'actors/ben-stiller.jpg',
                'popularity' => '52.26'
            ],
            [
                'name' => 'Kristen Wiig',
                'gender' => 'Female',
                'biography' => "Kristen Carroll Wiig was born on August 22, 1973 in Canandaigua, New York, to Laurie J. (Johnston), an artist, and Jon J. Wiig, a lake marina manager. She is of Norwegian (from her paternal grandfather), Irish, English, and Scottish descent. The family moved to Lancaster, Pennsylvania, before settling in Rochester, New York. When Wiig was 9 years old, her parents divorced and she lived with her mother and older brother Erik. In 2011, Wiig co-wrote and starred in Bridesmaids (2011), along with Melissa McCarthy, Maya Rudolph, and Rose Byrne. The film was a box office hit and won several awards, plus earned two Oscar nominations (Best Supporting Actress and Best Original Screenplay), and two Golden Globes nominations (Best Motion Picture - Comedy or Musical and Best Actress). Wiig also appeared in such notable films as Greg Mottola's Paul (2011), opposite Simon Pegg and Nick Frost; Andrew Jarecki's All Good Things (2010), opposite Ryan Gosling, Kirsten Dunst and Frank Langella; DreamWorks Animation's How to Train Your Dragon (2010), with Gerard Butler and Jay Baruchel; the Universal Pictures' animated feature film Despicable Me (2010), starring Steve Carell and Jason Segel; and Jennifer Westfeldt's Friends with Kids (2011), opposite Jon Hamm, Megan Fox, Adam Scott, Maya Rudolph and Westfeldt.",
                'date_of_birth' => '1973-08-22',
                'place_of_birth' => 'Canandaigue, New York, USA',
                'image_url' => 'actors/kristen-wiig.jpg',
                'popularity' => '31.94'
            ],
            [
                'name' => 'Adam Scott',
                'gender' => 'Male',
                'biography' => "Adam Paul Scott (born April 3, 1973) is an American actor, comedian, producer, and podcaster. He is known for his role as Ben Wyatt in the NBC sitcom Parks and Recreation for which he was twice nominated for the Critics' Choice Television Award for Best Actor in a Comedy Series. He has also appeared as Derek Huff in the film Step Brothers, Johnny Meyer in The Aviator, Henry Pollard in the Starz sitcom Party Down, Ed Mackenzie in the HBO series Big Little Lies, and Trevor in the NBC series The Good Place. In 2022, he began starring in the Apple TV+ psychological drama series Severance, for which he was nominated for the Primetime Emmy Award for Outstanding Lead Actor in a Drama Series.",
                'date_of_birth' => '1973-04-03',
                'place_of_birth' => 'Santa Cruz, California, USA',
                'image_url' => 'actors/adam-scott.jpg',
                'popularity' => '40.37'
            ],
        ];
        Actor::insert($actors);
    }
}
