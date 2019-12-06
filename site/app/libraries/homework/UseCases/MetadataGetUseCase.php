<?php namespace app\libraries\homework\UseCases;


use app\libraries\Core;
use app\libraries\homework\Entities\LibraryEntity;
use app\libraries\homework\Gateways\LibraryGateway;
use app\libraries\homework\Gateways\MetadataGateway;
use app\libraries\homework\Responses\MetadataGetResponse;
use app\libraries\homework\Gateways\Library\LibraryGatewayFactory;
use app\libraries\homework\Gateways\Metadata\MetadataGatewayFactory;

class MetadataGetUseCase extends BaseUseCase {

    /** @var LibraryGateway */
    protected $libraries;

    /** @var MetadataGateway */
    protected $metadata;

    public function __construct(Core $core) {
        parent::__construct($core);

        $this->libraries = LibraryGatewayFactory::getInstance();
        $this->metadata = MetadataGatewayFactory::getInstance();
    }

    /**
     * @param LibraryEntity $library
     * @return MetadataGetResponse
     */
    public function getMetadataFor(LibraryEntity $library): MetadataGetResponse {
        if (!$this->libraries->libraryExists($library)) {
            return MetadataGetResponse::error('Library does not exist.');
        }

        $meta = $this->metadata->get($library);
        return MetadataGetResponse::success($meta);
    }
}
