Sorter extension:
=======

Overview
--------
This extension provides sorting, also it is responsible for passing "sorter" settings to view layer.

Settings
---------
Sorters setting should be placed under `sorters` tree node.

```
datagrids:
    demo:
        source:
            type: orm
            query:
                select
                    - o.label
                    - 2 as someAlias
                    - test.some_id as someField
                from:
                    - { table: SomeBundle:SomeEntity, alias: o }
                join:
                    left:
                        joinNameOne:
                            join: o.someEntity
                            alias: someEntity
                        joinNameTwo:
                            join: o.testRel
                            alias: test
                    inner:
                        innerJoinName:
                            join: o.abcTestRel
                            alias: abc

        columns:
            label:
                type: field

            someColumn:
                type: fixed
                value_key: someAlias

        ....

        sorters:
            toolbar_sorting: true #optional, show additional sorting control in toolbar
            columns:
                label:  # column name for view layer
                    data_name: o.label   # property in result set (column name or alias), if main entity has alias
                                         # like in this example it will be added automatically
                    type: string #optional, affect labels in toolbar sorting
                someColumn:
                    data_name: someAlias
                    apply_callback: callable # if you want to apply some operations instead of just adding ORDER BY
            default:
                label: %oro_datagrid.extension.orm_sorter.class%::DIRECTION_DESC # sorters enabled by default, key is a column name

            multiple_sorting: true|false # is multisorting mode enabled ? False by default
            disable_default_sorting: true|false # When set to true, no default sorting will be applied
```

**Note:** _Customization could be done using `apply_callback` options_

**Note:** _Column name should be equal as name of correspond column_
