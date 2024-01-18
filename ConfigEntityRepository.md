# Config Entity Repository

### symfony_api/config/packages/doctrine.yaml
```yaml
doctrine:
    orm:
        auto_generate_proxy_classes: true
        enable_lazy_ghost_objects: true
        report_fields_where_declared: true
        validate_xml_mapping: true
        naming_strategy: doctrine.orm.naming_strategy.underscore_number_aware
        auto_mapping: true
        mappings:
            Comment:
                type: xml
                is_bundle: false
                dir: '%kernel.project_dir%/src/Core/CommentBundle/Infrastructure/config/orm'
                prefix: 'App\Core\CommentBundle\Domain\Entity'
                alias: Comment
```

### symfony_api/src/Core/CommentBundle/Infrastructure/config/orm/Comment.orm.xml
```xml
<?xml version="1.0" encoding="UTF-8"?>
<doctrine-mapping xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
                          https://www.doctrine-project.org/schemas/orm/doctrine-mapping.xsd">
    
    <entity name="App\Core\CommentBundle\Domain\Entity\Comment" table="comments" schema="comments" repository-class="App\Core\CommentBundle\Infrastructure\Repository\CommentRepository">
        <id name="id" type="integer" column="id">
            <generator strategy="AUTO" />
        </id>

        <field name="userId" type="string" length="255" />
        <field name="topcId" type="string" length="255" />
        <field name="comment" type="text" />
    </entity>
    
</doctrine-mapping>
```