<?php
 namespace MailPoetVendor\Doctrine\Common\Persistence\Mapping\Driver; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\Common\Persistence\Mapping\ClassMetadata; interface MappingDriver { public function loadMetadataForClass($className, \MailPoetVendor\Doctrine\Common\Persistence\Mapping\ClassMetadata $metadata); public function getAllClassNames(); public function isTransient($className); } 