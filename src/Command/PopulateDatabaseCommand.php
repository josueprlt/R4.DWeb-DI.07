<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Lego as Lego;

#[AsCommand(
    name: 'app:populate-database',
    description: 'Add a short description for your command',
)]
class PopulateDatabaseCommand extends Command
{
    private $EntityManager;

    public function __construct(EntityManagerInterface $EntityManager)
    {
        $this->EntityManager = $EntityManager;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'Argument description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('file');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        /* if ($input->getOption('option1')) {
            // ...
        } */

        $chaine = file_get_contents($arg1);
        $legosAll = json_decode($chaine);


        foreach ($legosAll as $leg) {
            $lego = new Lego();
            /* $lego->setCollection($leg->collection); */
            $lego->setId($leg->id);
            $lego->setName($leg->name);
            $lego->setDescription($leg->description);
            $lego->setPrice($leg->price);
            $lego->setPieces($leg->pieces);
            $lego->setBoxImage($leg->images->box);
            $lego->setLegoImage($leg->images->bg);

            $ent = $this->EntityManager;
            
            $ent->persist($lego);
            $ent->flush();
        }

        $io->success('Les éléments ont étés créés avec succès !');

        return Command::SUCCESS;
    }
}
