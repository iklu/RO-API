<?php

namespace Application\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;


class ActivateUserCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('admin:user:activate')
            ->setDescription('Activate a user')
            ->setDefinition(array(
                new InputArgument('username', InputArgument::REQUIRED, 'The username'),
            ))
            ->setHelp(<<<'EOT'
The <info>admin:user:activate</info> command activates a user (so they will be able to log in):

  <info>php %command.full_name% matthieu</info>
EOT
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');

        $manipulator = $this->getContainer()->get('admin_user.util.user_manipulator');
        $manipulator->activate($username);

        $output->writeln(sprintf('User "%s" has been activated.', $username));
    }

    /**
     * {@inheritdoc}
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('username')) {
            $question = new Question('Please choose a username:');
            $question->setValidator(function ($username) {
                if (empty($username)) {
                    throw new \Exception('Username can not be empty');
                }

                return $username;
            });
            $answer = $this->getHelper('question')->ask($input, $output, $question);

            $input->setArgument('username', $answer);
        }
    }
}
