<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;


class UploadScreenshotsToFirebase extends Command
{
    private $dir = '/Users/ammarkalim/Documents/Screenshots';

    protected function configure()
    {
        $this
            ->setName('app:upload-screenshot')
            ->setDescription('Get screenshots from the screenshot folder and uploads it to firebase');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Uploading screenshots...');
        $output->writeln('======');

        $output->writeln($this->getListOfFiles());
    }

    protected function getListOfFiles()
    {

        $fs = new Filesystem();
        $doesDirectoryExists = $fs->exists($this->dir);

        $listOfFiles = scandir($this->dir, 1);

        dump($listOfFiles);die;

        return $listOfFiles;
    }
}