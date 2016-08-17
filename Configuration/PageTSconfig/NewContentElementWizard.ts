mod.wizards.newContentElement.wizardItems.HE {
    header = HE Elemente
    elements {
            akkordeon {
                iconIdentifier = apps-toolbar-menu-actions
                title = LLL:EXT:he_accordion/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.akkordeon_title
                description = LLL:EXT:he_accordion/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.akkordeon_description
                tt_content_defValues {
                    CType = heaccordion_akkordeon
                }
            }
            element {
                iconIdentifier = content-textpic
                title = LLL:EXT:he_accordion/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.element_title
                description = LLL:EXT:he_accordion/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.element_description
                tt_content_defValues {
                    CType = heaccordion_element
                }
            }
    }
    show := addToList(akkordeon, element)
}
