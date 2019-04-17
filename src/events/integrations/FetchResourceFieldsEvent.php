<?php

namespace Solspace\ExpressForms\events\integrations;

use Solspace\ExpressForms\integrations\dto\ResourceField;
use Solspace\ExpressForms\integrations\IntegrationTypeInterface;
use yii\base\Event;

class FetchResourceFieldsEvent extends Event
{
    /** @var IntegrationTypeInterface */
    private $integrationType;

    /** @var string */
    private $resourceId;

    /** @var ResourceField[] */
    private $resourceFieldsList;

    /**
     * FetchResourcesEvent constructor.
     *
     * @param IntegrationTypeInterface $integrationType
     * @param string                   $resourceId
     * @param ResourceField[]          $resourceFieldList
     */
    public function __construct(IntegrationTypeInterface $integrationType, string $resourceId, array $resourceFieldList)
    {
        $this->integrationType    = $integrationType;
        $this->resourceId         = $resourceId;
        $this->resourceFieldsList = $resourceFieldList;

        parent::__construct();
    }

    /**
     * @return IntegrationTypeInterface
     */
    public function getIntegrationType(): IntegrationTypeInterface
    {
        return $this->integrationType;
    }

    /**
     * @return string
     */
    public function getResourceId(): string
    {
        return $this->resourceId;
    }

    /**
     * @return ResourceField[]
     */
    public function getResourceFieldsList(): array
    {
        return $this->resourceFieldsList ?? [];
    }

    /**
     * @param ResourceField[] $resourceFieldsList
     *
     * @return FetchResourceFieldsEvent
     */
    public function setResourceFieldsList(array $resourceFieldsList = []): FetchResourceFieldsEvent
    {
        $this->resourceFieldsList = $resourceFieldsList;

        return $this;
    }

    /**
     * @param ResourceField $resourceField
     *
     * @return FetchResourceFieldsEvent
     */
    public function addResourceField(ResourceField $resourceField): FetchResourceFieldsEvent
    {
        $this->resourceFieldsList[] = $resourceField;

        return $this;
    }
}
