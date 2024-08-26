<?php

namespace App\Enums;

use App\Traits\ConstantsTrait;

enum FileEnum: string
{
    use ConstantsTrait;
    case file_type_user_avatar = 'user_avatar';
    case file_type_user_cover = 'user_cover';
    case file_type_member_avatar = 'member_avatar';
    case file_type_board_of_directors_file= 'board_of_directors';
    case file_type_the_general_assembly_file= 'the_general_assembly';
    case file_type_the_organizational_structure_file= 'the_organizational_structure';
    case file_type_governance_attachments = "file_type_governance_attachments";
    case file_type_committee_main_icon = "file_type_committee_main_icon";
    case file_type_committee_icon = "file_type_committee_icon";
    case file_type_banner_image = "file_type_banner_image";
    case file_type_donation_type_main_icon = "file_type_donation_type_main_icon";
    case file_type_donation_type_icon = "file_type_donation_type_icon";
    case file_type_post_image = "file_type_post_image";
    case file_type_partner_image = "file_type_partner_image";
    case file_type_donation_image = "file_type_donation_image";
    case file_type_health_library_image = "file_type_health_library_image";
    case file_type_health_library_file = "file_type_health_library_file";
    case file_type_patient_awareness_image = "file_type_patient_awareness_image";
    case file_type_patient_awareness_pdf = "file_type_patient_awareness_pdf";
    case file_type_about_diesease_image  = "file_type_about_diesease_image";
    case file_type_information_about_treatment_image  = "file_type_information_about_treatment_image";

    public static function fileableTypes(): array
    {
        return [
            'User'
        ];
    }
}
