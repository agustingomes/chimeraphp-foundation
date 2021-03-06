<?php
declare(strict_types=1);

namespace Chimera;

use Chimera\MessageCreator\MessageCannotBeCreated;

/**
 * Encapsulates the execution of a query
 */
final class ExecuteQuery
{
    private ServiceBus $bus;
    private MessageCreator $messageCreator;
    private string $query;

    public function __construct(ServiceBus $bus, MessageCreator $messageCreator, string $query)
    {
        $this->bus            = $bus;
        $this->messageCreator = $messageCreator;
        $this->query          = $query;
    }

    /**
     * Creates the query with given input, executes it, and returns the result
     *
     * @return mixed
     *
     * @throws MessageCannotBeCreated
     */
    public function fetch(Input $input)
    {
        return $this->bus->handle(
            $this->messageCreator->create($this->query, $input)
        );
    }

    /**
     * Returns the name of the query to be handled
     */
    public function getQuery(): string
    {
        return $this->query;
    }
}
