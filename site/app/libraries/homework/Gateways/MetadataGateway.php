<?php namespace app\libraries\homework\Gateways;


use app\libraries\homework\Entities\LibraryEntity;
use app\libraries\homework\Entities\MetadataEntity;
use app\libraries\homework\Entities\MetadataGetStatus;
use app\libraries\homework\Entities\MetadataUpdateStatus;

interface MetadataGateway {
    /**
     * Update or set metadata for a library
     *
     * @param MetadataEntity $entity
     * @return MetadataUpdateStatus
     */
    public function update(MetadataEntity $entity): MetadataUpdateStatus;

    /**
     * Get metadata for a library
     *
     * @param LibraryEntity $entity
     * @return MetadataGetStatus
     */
    public function get(LibraryEntity $entity): MetadataGetStatus;

    /**
     * Get all libraries and their metadata.
     *
     * @param string $location
     * @return MetadataEntity[]
     */
    public function getAll(string $location): array;

    /**
     * Checks whether a name is taken or not.
     *
     * @param string $name
     * @return bool
     */
    public function nameExists(string $name): bool;

    /**
     * Retrieves a library and its metadata by a user defined name
     *
     * @param string $name
     * @return MetadataGetStatus
     */
    public function getFromName(string $name): MetadataGetStatus;
}
