<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFJxe2yG\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFJxe2yG/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFJxe2yG.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFJxe2yG\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFJxe2yG\App_KernelDevDebugContainer([
    'container.build_hash' => 'FJxe2yG',
    'container.build_id' => '168fd8ea',
    'container.build_time' => 1628714932,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFJxe2yG');
