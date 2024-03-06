<?php declare(strict_types=1);

namespace JoeCianflone\SuperModules\Enums;

enum TemplateNames: string
{
    case MODULE = "{{module}}";
    case MODULE_COMPOSER = "{{module_composer}}";
    case MODULE_SRC_FOLDER = "{{module_src_folder}}";
    case ROOT_FOLDER = "{{root_folder}}";
}
