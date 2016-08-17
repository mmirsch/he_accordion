tt_content.heaccordion_akkordeonX = FLUIDTEMPLATE
tt_content.heaccordion_akkordeonX {
    file = EXT:he_accordion/Resources/Private/Templates/TtContent/akkordeon.html

    dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
    dataProcessing.10 {
        if.isTrue.field = tx_heaccordion_elements
        table = tx_heaccordion_elements
        pidInList.field = pid
        where = parentid=###uid### AND deleted=0 AND hidden=0
        markers {
            uid.field = uid
        }
        as = data_elements

        dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
        dataProcessing.10 {
            if.isTrue.field = tx_heaccordion_media
            references {
                fieldName = tx_heaccordion_media
                table = tx_heaccordion_elements
            }

            as = data_media
        }
        dataProcessing.20 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
        dataProcessing.20 {
            if.isTrue.field = tx_heaccordion_preview_image
            references {
                fieldName = tx_heaccordion_preview_image
                table = tx_heaccordion_elements
            }
            as = data_preview_image
        }

        dataProcessing.30 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
        dataProcessing.30 {
            if.isTrue.field = tx_heaccordion_children
            table = tx_heaccordion_elements
            pidInList.field = pid
            where = subaccordion_parentid=###uid### AND deleted=0 AND hidden=0
            markers {
                uid.field = uid
            }
            as = data_children

            dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            dataProcessing.10 {
                if.isTrue.field = tx_heaccordion_media
                references {
                    fieldName = tx_heaccordion_media
                    table = tx_heaccordion_elements
                }

                as = data_children_media
            }
            dataProcessing.20 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            dataProcessing.20 {
                if.isTrue.field = tx_heaccordion_preview_image
                references {
                    fieldName = tx_heaccordion_preview_image
                    table = tx_heaccordion_elements
                }
                as = data_children_preview_image
            }
        }
    }
}

dataProcessingElem  = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
dataProcessingElem {
    if.isTrue.field = tx_heaccordion_elements
    table = tx_heaccordion_elements
    pidInList.field = pid
    orderBy = tx_heaccordion_elements.sorting
    where = parentid=###uid### AND deleted=0 AND hidden=0
    markers {
        uid.field = uid
    }
    as = data_elements
    dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
    dataProcessing.10 {
        if.isTrue.field = tx_heaccordion_media
        references {
            fieldName = tx_heaccordion_media
            table = tx_heaccordion_elements
        }

        as = data_media
    }
    dataProcessing.20 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
    dataProcessing.20 {
        if.isTrue.field = tx_heaccordion_preview_image
        references {
            fieldName = tx_heaccordion_preview_image
            table = tx_heaccordion_elements
        }
        as = data_preview_image
    }
}

dataProcessingChildren < dataProcessingElem
dataProcessingChildren {
    if.isTrue.field = tx_heaccordion_children
    where = subaccordion_parentid=###uid### AND deleted=0 AND hidden=0
}

dataProcessingElem.dataProcessing.30 < dataProcessingChildren
dataProcessingElem.dataProcessing.30.dataProcessing.30 < dataProcessingChildren

dataProcessingElem.dataProcessing.30.dataProcessing.30 <

tt_content.heaccordion_akkordeon = FLUIDTEMPLATE
tt_content.heaccordion_akkordeon {
    file = EXT:he_accordion/Resources/Private/Templates/TtContent/akkordeon.html
    dataProcessing.10 < dataProcessingElem
}
