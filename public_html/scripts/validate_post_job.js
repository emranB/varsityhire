function validate_post_job_form(){
  var form = $("#post_job_form");
  // var select = $("#job_category").val();
  var select = $("select[name=job_category] option:selected").val();


/************************************************ DOG WALKING ************************************************/
//   if( select == "dog_walking" ){
//     var job_Title = $("#job_title").val();
//
//     if( $("input[name=A2]").is(":checked") ){
//       var length_of_walk = $("input[name=A2]:checked").val();
//     }else{
//       var length_of_walk = "";
//     }
//
//     var type_of_dog = $("textarea[name=A4]").val();
//     var age_of_dog = $("input[name=A5_Years]").val() + "y, " + $("input[name=A5_Months]").val() + "m";
//
//     if( $("input[name=A6]").is(":checked") ){
//       var equipment_provided = $("input[name=A6]:checked").val();
//     }else{
//       var equipment_provided = "";
//     }
//
//     if( $("input[name=A8]").is(":checked") ){
//       var materials_required = $("input[name=A8]:checked").val();
//     }else{
//       var materials_required = "";
//     }
//
//     var address_of_service_name = $("input[name=address_of_service_name]").val();
//     var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//     var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//     var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//     var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//     if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//         length_of_walk !== "" && type_of_dog !== "" && age_of_dog !== "" &&
//         equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//         address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//       var valid;
//       $("input.date_of_venue").each(function(){
//         var date_of_venue = $(this).val();
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $(this).before("<span class='el el-ok'></span>");
//           valid = true;
//         }else{
//           $("span.el").remove();
//           $(this).before("<span class='el el-remove'></span>");
//           valid = false;
//         }
//       })
//
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         return false;
//       }else{
//         $("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         return false;
//       }
//
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         return false;
//       }
//
//       return valid;
//
//     }else{
//
//       if( length_of_walk == "" ){
//         $("input[name=A2]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A2]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=A2]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A2]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//
//       if( type_of_dog == "" ){
//         $("textarea[name=A4]").prev("legend").find("span.el").remove();
//         $("textarea[name=A4]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=A4]").prev("legend").find("span.el").remove();
//         $("textarea[name=A4]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//
//       // if( age_of_dog == "" ){
//       //   $("span.el").remove();
//       //   $("input[name=age_of_dog]").before("<span class='el el-remove'></span>");
//       //   return false;
//       // }else{
//       //   $("span.el").remove();
//       //   $("input[name=age_of_dog]").before("<span class='el el-ok'></span>");
//       // }
//
//       if( equipment_provided == "" ){
//         $("input[name=A6]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A6]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=A6]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A6]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//
//       if( materials_required == "" ){
//         $("input[name=A8]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A8]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=A8]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=A8]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//
//       if( address_of_service_name == "" ){
//         $("input[name=address_of_service_name]").prev("span.el").remove();
//         $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_name]").prev("span.el").remove();
//         $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//       }
//
//       var valid;
//       $("input.date_of_venue").each(function(){
//         var date_of_venue = $(this).val();
//         if( $("input.date_of_venue").val() == "" ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }else{
//           if( validate_date(date_of_venue) ){
//             $("span.el").remove();
//             $("input.date_of_venue").before("<span class='el el-ok'></span>");
//           }else{
//             $("span.el").remove();
//             $("input.date_of_venue").before("<span class='el el-remove'></span>");
//           }
//         }
//       })
//
//       if( address_of_service_postal_code == "" ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         if( !validate_postalCode(address_of_service_postal_code) ){
//           $("input[name=address_of_service_postal_code]").find("span.el").remove();
//           $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=address_of_service_postal_code]").find("span.el").remove();
//           $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//         }
//       }
//
//       if( time_of_service_hours == "" ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         if( validate_time_of_service_hours(time_of_service_hours) ){
//           $("input[name=time_of_service_hours]").find("span.el").remove();
//           $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//         }else{
//           $("input[name=time_of_service_hours]").find("span.el").remove();
//           $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }
//       }
//
//       if( time_of_service_minutes == "" ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         if( validate_time_of_service_minutes(time_of_service_minutes) ){
//           $("input[name=time_of_service_minutes]").find("span.el").remove();
//           $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//         }else{
//           $("input[name=time_of_service_minutes]").find("span.el").remove();
//           $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }
//       }
//
//       return valid;
//
//     }
//   }
// /*********************************************************************************************************/
//
//
//
// /*********************************************************************************************************/
// if( select == "exterior_window_washing" ){
//   var job_Title = $("#job_title").val();
//
//   if( $("input[name=number_of_items]").is(":checked") ){
//     var number_of_items = $("input[name=number_of_items]:checked").val();
//   }else{
//     var number_of_items = "";
//   }
//
//   if( $("input[name=percentage_requiring_ladder]").is(":checked") ){
//     var percentage_requiring_ladder = $("input[name=percentage_requiring_ladder]:checked").val();
//   }else{
//     var percentage_requiring_ladder = "";
//   }
//
//   if( $("input[name=avg_size_of_windows]").is(":checked") ){
//     var avg_size_of_windows = $("input[name=avg_size_of_windows]:checked").val();
//   }else{
//     var avg_size_of_windows = "";
//   }
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       number_of_items !== "" && percentage_requiring_ladder !== "" && avg_size_of_windows !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( number_of_items == "" ){
//       $("input[name=number_of_items]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=number_of_items]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=number_of_items]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=number_of_items]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( percentage_requiring_ladder == "" ){
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").find("span.el").remove();
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").find("span.el").remove();
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( avg_size_of_windows == "" ){
//       $("input[name=avg_size_of_windows]").prev("legend").find("span.el").remove();
//       $("input[name=avg_size_of_windows]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=avg_size_of_windows]").prev("legend").find("span.el").remove();
//       $("input[name=avg_size_of_windows]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "delivery" ){
//   var job_Title = $("#job_title").val();
//
//   var delivery_sub_services = $("select[name=delivery_sub_services] option:selected").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       delivery_sub_services !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         if( delivery_sub_services == "to_specific_address" ){
//           var type_of_items_to_specific_address = $("select[name=type_of_items_to_specific_address] option:selected").val();
//           var description_of_type_of_items_to_specific_address = $("textarea[name=description_of_type_of_items_to_specific_address]").val();
//           var number_of_items_to_specific_address = $("input[name=number_of_items_to_specific_address]").val();
//           var process_of_delivery_to_specific_address = $("input[name=process_of_delivery_to_specific_address]:checked").val();
//           var location_of_delivery_to_specific_address = $("textarea[name=location_of_delivery_to_specific_address]").val();
//
//           if( type_of_items_to_specific_address == "" ){
//             $("select[name=type_of_items_to_specific_address]").prev("span.el").remove();
//             $("select[name=type_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=type_of_items_to_specific_address]").prev("span.el").remove();
//             $("select[name=type_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//           }
//           if( description_of_type_of_items_to_specific_address == "" ){
//             $("textarea[name=description_of_type_of_items_to_specific_address]").prev("span.el").remove();
//             $("textarea[name=description_of_type_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=description_of_type_of_items_to_specific_address]").prev("span.el").remove();
//             $("textarea[name=description_of_type_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//           }
//           if( number_of_items_to_specific_address == "" ){
//             $("input[name=number_of_items_to_specific_address]").prev("span.el").remove();
//             $("input[name=number_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=number_of_items_to_specific_address]").prev("span.el").remove();
//             $("input[name=number_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//           }
//           if( process_of_delivery_to_specific_address == "" ){
//             $("input[name=process_of_delivery_to_specific_address]").prev("span.el").remove();
//             $("input[name=process_of_delivery_to_specific_address]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=process_of_delivery_to_specific_address]").prev("span.el").remove();
//             $("input[name=process_of_delivery_to_specific_address]").before("<span class='el el-ok'></span>");
//           }
//           if( location_of_delivery_to_specific_address == "" ){
//             $("textarea[name=location_of_delivery_to_specific_address]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_specific_address]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=location_of_delivery_to_specific_address]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_specific_address]").before("<span class='el el-ok'></span>");
//           }
//
//         }
//         else if( delivery_sub_services == "to_set_areas" ){
//
//           var type_of_items_to_set_areas = $("select[name=type_of_items_to_set_areas] option:selected").val();
//           var description_of_type_of_items_to_set_areas = $("textarea[name=description_of_type_of_items_to_set_areas]").val();
//           var number_of_items_to_set_areas = $("input[name=number_of_items_to_set_areas]").val();
//           var process_of_delivery_to_set_areas = $("input[name=process_of_delivery_to_set_areas]:checked").val();
//           var location_of_delivery_to_set_areas = $("textarea[name=location_of_delivery_to_set_areas]").val();
//
//           if( type_of_items_to_set_areas == "" ){
//             $("select[name=type_of_items_to_set_areas]").prev("span.el").remove();
//             $("select[name=type_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=type_of_items_to_set_areas]").prev("span.el").remove();
//             $("select[name=type_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//           if( description_of_type_of_items_to_set_areas == "" ){
//             $("textarea[name=description_of_type_of_items_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=description_of_type_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=description_of_type_of_items_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=description_of_type_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//           if( number_of_items_to_set_areas == "" ){
//             $("input[name=number_of_items_to_set_areas]").prev("span.el").remove();
//             $("input[name=number_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=number_of_items_to_set_areas]").prev("span.el").remove();
//             $("input[name=number_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//           if( process_of_delivery_to_set_areas == "" ){
//             $("input[name=process_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("input[name=process_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=process_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("input[name=process_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//           if( location_of_delivery_to_set_areas == "" ){
//             $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//
//         }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( delivery_sub_services == "" ){
//       $("select[name=delivery_sub_services]").prev("legend").find("span.el").remove();
//       $("select[name=delivery_sub_services]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("select[name=delivery_sub_services]").prev("legend").find("span.el").remove();
//       $("select[name=delivery_sub_services]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( delivery_sub_services == "to_specific_address" ){
//       var type_of_items_to_specific_address = $("select[name=type_of_items_to_specific_address] option:selected").val();
//       var description_of_type_of_items_to_specific_address = $("textarea[name=description_of_type_of_items_to_specific_address]").val();
//       var number_of_items_to_specific_address = $("input[name=number_of_items_to_specific_address]").val();
//       var process_of_delivery_to_specific_address = $("input[name=process_of_delivery_to_specific_address]:checked").val();
//       var location_of_delivery_to_specific_address = $("textarea[name=location_of_delivery_to_specific_address]").val();
//
//       if( type_of_items_to_specific_address == "" ){
//         $("select[name=type_of_items_to_specific_address]").prev("span.el").remove();
//         $("select[name=type_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=type_of_items_to_specific_address]").prev("span.el").remove();
//         $("select[name=type_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//       }
//       if( description_of_type_of_items_to_specific_address == "" ){
//         $("textarea[name=description_of_type_of_items_to_specific_address]").prev("span.el").remove();
//         $("textarea[name=description_of_type_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=description_of_type_of_items_to_specific_address]").prev("span.el").remove();
//         $("textarea[name=description_of_type_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//       }
//       if( number_of_items_to_specific_address == "" ){
//         $("input[name=number_of_items_to_specific_address]").prev("span.el").remove();
//         $("input[name=number_of_items_to_specific_address]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=number_of_items_to_specific_address]").prev("span.el").remove();
//         $("input[name=number_of_items_to_specific_address]").before("<span class='el el-ok'></span>");
//       }
//       if( process_of_delivery_to_specific_address == "" ){
//         $("input[name=process_of_delivery_to_specific_address]").prev("span.el").remove();
//         $("input[name=process_of_delivery_to_specific_address]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=process_of_delivery_to_specific_address]").prev("span.el").remove();
//         $("input[name=process_of_delivery_to_specific_address]").before("<span class='el el-ok'></span>");
//       }
//       if( location_of_delivery_to_specific_address == "" ){
//         $("textarea[name=location_of_delivery_to_specific_address]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_specific_address]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=location_of_delivery_to_specific_address]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_specific_address]").before("<span class='el el-ok'></span>");
//       }
//
//     }
//     else if( delivery_sub_services == "to_set_areas" ){
//
//       var type_of_items_to_set_areas = $("select[name=type_of_items_to_set_areas] option:selected").val();
//       var description_of_type_of_items_to_set_areas = $("textarea[name=description_of_type_of_items_to_set_areas]").val();
//       var number_of_items_to_set_areas = $("input[name=number_of_items_to_set_areas]").val();
//       var process_of_delivery_to_set_areas = $("input[name=process_of_delivery_to_set_areas]:checked").val();
//       var location_of_delivery_to_set_areas = $("textarea[name=location_of_delivery_to_set_areas]").val();
//
//       if( type_of_items_to_set_areas == "" ){
//         $("select[name=type_of_items_to_set_areas]").prev("span.el").remove();
//         $("select[name=type_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=type_of_items_to_set_areas]").prev("span.el").remove();
//         $("select[name=type_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//       if( description_of_type_of_items_to_set_areas == "" ){
//         $("textarea[name=description_of_type_of_items_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=description_of_type_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=description_of_type_of_items_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=description_of_type_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//       if( number_of_items_to_set_areas == "" ){
//         $("input[name=number_of_items_to_set_areas]").prev("span.el").remove();
//         $("input[name=number_of_items_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=number_of_items_to_set_areas]").prev("span.el").remove();
//         $("input[name=number_of_items_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//       if( process_of_delivery_to_set_areas == "" ){
//         $("input[name=process_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("input[name=process_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=process_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("input[name=process_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//       if( location_of_delivery_to_set_areas == "" ){
//         $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "garage_shop_shed_cleaning" ){
//   var job_Title = $("#job_title").val();
//
//   var garage_shop_shed_cleaning_subservices = $("select[name=garage_shop_shed_cleaning_subservices] option:selected").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       garage_shop_shed_cleaning_subservices !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         if( garage_shop_shed_cleaning_subservices == "garbage_clean_up" ){
//           var floor_area_garbage_clean_up = $("select[name=floor_area_garbage_clean_up] option:selected").val();
//           var how_much_garbage_garbage_clean_up = $("input[name=how_much_garbage_garbage_clean_up]:checked").val();
//           var where_to_garbage_clean_up = $("input[name=where_to_garbage_clean_up]:checked").val();
//           var how_to_deliver_garbage_clean_up = $("input[name=how_to_deliver_garbage_clean_up]:checked").val();
//
//           if( floor_area_garbage_clean_up == "" ){
//             $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//             $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//             $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-ok'></span>");
//           }
//           if( how_much_garbage_garbage_clean_up == "" ){
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( where_to_garbage_clean_up == "" ){
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( how_to_deliver_garbage_clean_up == "" ){
//             $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( location_of_delivery_to_set_areas == "" ){
//             $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//             $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//           }
//         }
//
//         else if( garage_shop_shed_cleaning_subservices == "organize_and_put_away_items" ){
//           var floor_area_organize_and_put_away_items = $("select[name=floor_area_organize_and_put_away_items] option:selected").val();
//           var how_much_cluster_organize_and_put_away_items = $("input[name=how_much_cluster_organize_and_put_away_items]:checked").val();
//           var heavy_lifting_involved_organize_and_put_away_items = $("input[name=heavy_lifting_involved_organize_and_put_away_items]:checked").val();
//
//           if( floor_area_organize_and_put_away_items == "" ){
//             $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//             $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//             $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-ok'></span>");
//           }
//           if( how_much_cluster_organize_and_put_away_items == "" ){
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( heavy_lifting_involved_organize_and_put_away_items == "" ){
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//             $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//           }
//         }
//         // else if( garage_shop_shed_cleaning_subservices == "sweep_floors" ){
//         //
//         // }
//         else if( garage_shop_shed_cleaning_subservices == "other" ){
//           var type_of_items_other = $("select[name=type_of_items_other] option:selected").val();
//           var details_of_service_other = $("textarea[name=details_of_service_other]").val();
//           var number_of_hours_other = $("input[name=number_of_hours_other]").val();
//
//           if( type_of_items_other == "" ){
//             $("select[name=type_of_items_other]").prev("legend").prev("span.el").remove();
//             $("select[name=type_of_items_other]").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=type_of_items_other]").prev("legend").prev("span.el").remove();
//             $("select[name=type_of_items_other]").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( details_of_service_other == "" ){
//             $("textarea[name=details_of_service_other]").prev("legend").prev("span.el").remove();
//             $("textarea[name=details_of_service_other]").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=details_of_service_other]").prev("legend").prev("span.el").remove();
//             $("textarea[name=details_of_service_other]").prev("legend").before("<span class='el el-ok'></span>");
//           }
//           if( number_of_hours_other == "" ){
//             $("input[name=number_of_hours_other]").prev("legend").prev("span.el").remove();
//             $("input[name=number_of_hours_other]").prev("legend").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=number_of_hours_other]").prev("legend").prev("span.el").remove();
//             $("input[name=number_of_hours_other]").prev("legend").before("<span class='el el-ok'></span>");
//           }
//         }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( garage_shop_shed_cleaning_subservices == "" ){
//       $("select[name=garage_shop_shed_cleaning_subservices]").prev("legend").prev("span.el").remove();
//       $("select[name=garage_shop_shed_cleaning_subservices]").prev("legend").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("select[name=garage_shop_shed_cleaning_subservices]").prev("legend").prev("span.el").remove();
//       $("select[name=garage_shop_shed_cleaning_subservices]").prev("legend").before("<span class='el el-ok'></span>");
//     }
//
//     if( garage_shop_shed_cleaning_subservices == "garbage_clean_up" ){
//       var floor_area_garbage_clean_up = $("select[name=floor_area_garbage_clean_up] option:selected").val();
//       var how_much_garbage_garbage_clean_up = $("input[name=how_much_garbage_garbage_clean_up]:checked").val();
//       var where_to_garbage_clean_up = $("input[name=where_to_garbage_clean_up]:checked").val();
//       var how_to_deliver_garbage_clean_up = $("input[name=how_to_deliver_garbage_clean_up]:checked").val();
//
//       if( floor_area_garbage_clean_up == "" ){
//         $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//         $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//         $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-ok'></span>");
//       }
//       if( how_much_garbage_garbage_clean_up == "" ){
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( where_to_garbage_clean_up == "" ){
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( how_to_deliver_garbage_clean_up == "" ){
//         $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_to_deliver_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( location_of_delivery_to_set_areas == "" ){
//         $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=location_of_delivery_to_set_areas]").prev("span.el").remove();
//         $("textarea[name=location_of_delivery_to_set_areas]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     else if( garage_shop_shed_cleaning_subservices == "organize_and_put_away_items" ){
//       var floor_area_organize_and_put_away_items = $("select[name=floor_area_organize_and_put_away_items] option:selected").val();
//       var how_much_cluster_organize_and_put_away_items = $("input[name=how_much_cluster_organize_and_put_away_items]:checked").val();
//       var heavy_lifting_involved_organize_and_put_away_items = $("input[name=heavy_lifting_involved_organize_and_put_away_items]:checked").val();
//
//       if( floor_area_organize_and_put_away_items == "" ){
//         $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//         $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=floor_area_garbage_clean_up]").prev("span.el").remove();
//         $("select[name=floor_area_garbage_clean_up]").before("<span class='el el-ok'></span>");
//       }
//       if( how_much_cluster_organize_and_put_away_items == "" ){
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=how_much_garbage_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( heavy_lifting_involved_organize_and_put_away_items == "" ){
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").prev("span.el").remove();
//         $("input[name=where_to_garbage_clean_up]").parent("label").prev("legend").before("<span class='el el-ok'></span>");
//       }
//     }
//     // else if( garage_shop_shed_cleaning_subservices == "sweep_floors" ){
//     //
//     // }
//     else if( garage_shop_shed_cleaning_subservices == "other" ){
//       var type_of_items_other = $("select[name=type_of_items_other] option:selected").val();
//       var details_of_service_other = $("textarea[name=details_of_service_other]").val();
//       var number_of_hours_other = $("input[name=number_of_hours_other]").val();
//
//       if( type_of_items_other == "" ){
//         $("select[name=type_of_items_other]").prev("legend").prev("span.el").remove();
//         $("select[name=type_of_items_other]").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=type_of_items_other]").prev("legend").prev("span.el").remove();
//         $("select[name=type_of_items_other]").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( details_of_service_other == "" ){
//         $("textarea[name=details_of_service_other]").prev("legend").prev("span.el").remove();
//         $("textarea[name=details_of_service_other]").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=details_of_service_other]").prev("legend").prev("span.el").remove();
//         $("textarea[name=details_of_service_other]").prev("legend").before("<span class='el el-ok'></span>");
//       }
//       if( number_of_hours_other == "" ){
//         $("input[name=number_of_hours_other]").prev("legend").prev("span.el").remove();
//         $("input[name=number_of_hours_other]").prev("legend").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=number_of_hours_other]").prev("legend").prev("span.el").remove();
//         $("input[name=number_of_hours_other]").prev("legend").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "gutter_cleaning" ){
//   var job_Title = $("#job_title").val();
//
//   var floor_area = $("input[name=floor_area]:checked").val();
//   var how_many_stories = $("input[name=how_many_stories]:checked").val();
//   var length_of_gutter = $("input[name=length_of_gutter]").val();
//   var how_long_since_last_cleanout = $("input[name=how_long_since_last_cleanout]:checked").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       floor_area !== "" && how_many_stories !== "" && length_of_gutter !== "" && how_long_since_last_cleanout !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( floor_area == "" ){
//       $("input[name=floor_area]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=floor_area]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=floor_area]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=floor_area]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_stories == "" ){
//       $("textarea[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//       $("textarea[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//       $("textarea[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( length_of_gutter == "" ){
//       $("input[name=length_of_gutter]").prev("legend").find("span.el").remove();
//       $("input[name=length_of_gutter]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=length_of_gutter]").prev("legend").find("span.el").remove();
//       $("input[name=length_of_gutter]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_long_since_last_cleanout == "" ){
//       $("input[name=how_long_since_last_cleanout]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_long_since_last_cleanout]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_long_since_last_cleanout]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_long_since_last_cleanout]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "house_cleaning" ){
//   var job_Title = $("#job_title").val();
//
//   var house_cleaning_subservices_length = $("input[name='cb[]']:checked").length;
//
//   var type_of_residence_house_cleaning = $("input[name=type_of_residence_house_cleaning]:checked").val();
//   var total_floor_area_house_cleaning = $("input[name=total_floor_area_house_cleaning]:checked").val();
//   var carpet_floor_area_house_cleaing = $("input[name=carpet_floor_area_house_cleaing]:checked").val();
//   var how_many_stories_house_cleaning = $("select[name=how_many_stories_house_cleaning] option:selected").val();
//   var cleaning_product_preference = $("input[name=cleaning_product_preference]:checked").val();
//   var pets_that_shed_house_cleaning = $("input[name=pets_that_shed_house_cleaning]:checked").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       house_cleaning_subservices_length !== "0" && type_of_residence_house_cleaning !== "" && total_floor_area_house_cleaning !== "" &&
//       carpet_floor_area_house_cleaing !== "" && how_many_stories_house_cleaning !== "" && cleaning_product_preference !== "" && pets_that_shed_house_cleaning !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         if( $("input#living_areas_and_bedrooms").is(":checked") ){
//           var how_many_bedrooms = $("select[name=how_many_bedrooms] option:selected").val();
//           var how_many_living_rooms = $("select[name=how_many_living_rooms] option:selected").val();
//           if( how_many_bedrooms == "" ){
//             $("select[name=how_many_bedrooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_bedrooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_bedrooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_bedrooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( how_many_living_rooms == "" ){
//             $("select[name=how_many_living_rooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_living_rooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_living_rooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_living_rooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#bathrooms").is(":checked") ){
//           var how_many_bathrooms = $("select[name=how_many_bathrooms] option:selected").val();
//           if( how_many_bathrooms == "" ){
//             $("select[name=how_many_bathrooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_bathrooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_bathrooms]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_bathrooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#kitchens").is(":checked") ){
//           var how_many_kitchens = $("select[name=how_many_kitchens] option:selected").val();
//           if( how_many_kitchens == "" ){
//             $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#laundry_package").is(":checked") ){
//           var loads_of_laundry = $("select[name=loads_of_laundry] option:selected").val();
//           var type_and_number_of_laundry = $("textarea[name=type_and_number_of_laundry]").val();
//           if( how_many_kitchens == "" ){
//             $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( type_and_number_of_laundry == "" ){
//             $("textarea[name=type_and_number_of_laundry]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_number_of_laundry]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=type_and_number_of_laundry]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_number_of_laundry]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#deep_cleaning_packages").is(":checked") ){
//           var how_many_windowns_and_doors = $("input[name=how_many_windowns_and_doors]:selected").val();
//           var avg_size_of_windows = $("input[name=avg_size_of_windows]:selected").val();
//           if( how_many_windowns_and_doors == "" ){
//             $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( avg_size_of_windows == "" ){
//             $("input[name=avg_size_of_windows]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=avg_size_of_windows]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=avg_size_of_windows]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=avg_size_of_windows]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( house_cleaning_subservices_length == "0" ){
//       $("input[name='house_cleaning_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='house_cleaning_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='house_cleaning_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='house_cleaning_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( type_of_residence_house_cleaning == "" ){
//       $("input[name=type_of_residence_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=type_of_residence_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=type_of_residence_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=type_of_residence_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( total_floor_area_house_cleaning == "" ){
//       $("input[name=total_floor_area_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=total_floor_area_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=total_floor_area_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=total_floor_area_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( carpet_floor_area_house_cleaing == "" ){
//       $("input[name=carpet_floor_area_house_cleaing]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=carpet_floor_area_house_cleaing]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=carpet_floor_area_house_cleaing]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=carpet_floor_area_house_cleaing]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_stories_house_cleaning == "" ){
//       $("select[name=how_many_stories_house_cleaning]").prev("legend").find("span.el").remove();
//       $("select[name=how_many_stories_house_cleaning]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("select[name=how_many_stories_house_cleaning]").prev("legend").find("span.el").remove();
//       $("select[name=how_many_stories_house_cleaning]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( cleaning_product_preference == "" ){
//       $("input[name=cleaning_product_preference]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=cleaning_product_preference]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=cleaning_product_preference]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=cleaning_product_preference]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( pets_that_shed_house_cleaning == "" ){
//       $("input[name=pets_that_shed_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=pets_that_shed_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=pets_that_shed_house_cleaning]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=pets_that_shed_house_cleaning]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     /********************************* Sub-services *********************************/
//     if( $("input#living_areas_and_bedrooms").is(":checked") ){
//       var how_many_bedrooms = $("select[name=how_many_bedrooms] option:selected").val();
//       var how_many_living_rooms = $("select[name=how_many_living_rooms] option:selected").val();
//       if( how_many_bedrooms == "" ){
//         $("select[name=how_many_bedrooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_bedrooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=how_many_bedrooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_bedrooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//       if( how_many_living_rooms == "" ){
//         $("select[name=how_many_living_rooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_living_rooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=how_many_living_rooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_living_rooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     if( $("input#bathrooms").is(":checked") ){
//       var how_many_bathrooms = $("select[name=how_many_bathrooms] option:selected").val();
//       if( how_many_bathrooms == "" ){
//         $("select[name=how_many_bathrooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_bathrooms]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=how_many_bathrooms]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_bathrooms]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     if( $("input#kitchens").is(":checked") ){
//       var how_many_kitchens = $("select[name=how_many_kitchens] option:selected").val();
//       if( how_many_kitchens == "" ){
//         $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     if( $("input#laundry_package").is(":checked") ){
//       var loads_of_laundry = $("select[name=loads_of_laundry] option:selected").val();
//       var type_and_number_of_laundry = $("textarea[name=type_and_number_of_laundry]").val();
//       if( how_many_kitchens == "" ){
//         $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("select[name=how_many_kitchens]").prev("legend").find("span.el").remove();
//         $("select[name=how_many_kitchens]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//       if( type_and_number_of_laundry == "" ){
//         $("textarea[name=type_and_number_of_laundry]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_number_of_laundry]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=type_and_number_of_laundry]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_number_of_laundry]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     if( $("input#deep_cleaning_packages").is(":checked") ){
//       var how_many_windowns_and_doors = $("input[name=how_many_windowns_and_doors]:selected").val();
//       var avg_size_of_windows = $("input[name=avg_size_of_windows]:selected").val();
//       if( how_many_windowns_and_doors == "" ){
//         $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=how_many_windowns_and_doors]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//       if( avg_size_of_windows == "" ){
//         $("input[name=avg_size_of_windows]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=avg_size_of_windows]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=avg_size_of_windows]").parent("label").prev("legend").find("span.el").remove();
//         $("input[name=avg_size_of_windows]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     /*******************************************************************************/
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "international_languages" ){
//   var job_Title = $("#job_title").val();
//
//   var language_to_learn = $("textarea[name=language_to_learn]").val();
//   var age_group = $("input[name=age_group]:checked").val();
//   var languages_spoken = $("textarea[name=languages_spoken]").val();
//   var languages_to_learn = $("input[name=languages_to_learn]:checked").val();
//   var reason_for_learning_language_length = $("input[name='reason_for_learning_language[]']:checked").length;
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       language_to_learn !== "" && age_group !== "" && languages_spoken !== "" &&
//       languages_to_learn !== "" && reason_for_learning_language_length !== "0" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( language_to_learn == "" ){
//       $("textarea[name=language_to_learn]").prev("legend").find("span.el").remove();
//       $("textarea[name=language_to_learn]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=language_to_learn]").prev("legend").find("span.el").remove();
//       $("textarea[name=language_to_learn]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( age_group == "" ){
//       $("input[name=age_group]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=age_group]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=age_group]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=age_group]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( languages_spoken == "" ){
//       $("textarea[name=languages_spoken]").prev("legend").find("span.el").remove();
//       $("textarea[name=languages_spoken]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=languages_spoken]").prev("legend").find("span.el").remove();
//       $("textarea[name=languages_spoken]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//     if( languages_to_learn == "" ){
//       $("input[name=languages_to_learn]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=languages_to_learn]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=languages_to_learn]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=languages_to_learn]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//     if( reason_for_learning_language_length == "0" ){
//       $("input[name='reason_for_learning_language[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='reason_for_learning_language[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='reason_for_learning_language[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='reason_for_learning_language[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "landscaping" ){
//   var job_Title = $("#job_title").val();
//
//   var landscaping_subservices_length = $("input[name='landscaping_subservices[]']:checked").length;
//
//   var scope_of_work = $("textarea[name=scope_of_work]").val();
//   var quantity_of_work = $("textarea[name=quantity_of_work]").val();
//   var how_many_hours = $("input[name=how_many_hours]").val();
//   var special_working_conditions = $("textarea[name=special_working_conditions]").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       landscaping_subservices_length !== "0" && scope_of_work !== "" && quantity_of_work !== "" &&
//       how_many_hours !== "" && special_working_conditions !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( landscaping_subservices_length == "" ){
//       $("input[name='landscaping_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='landscaping_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='landscaping_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='landscaping_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( scope_of_work == "" ){
//       $("textarea[name=scope_of_work]").prev("legend").find("span.el").remove();
//       $("textarea[name=scope_of_work]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=scope_of_work]").prev("legend").find("span.el").remove();
//       $("textarea[name=scope_of_work]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( quantity_of_work == "" ){
//       $("textarea[name=quantity_of_work]").prev("legend").find("span.el").remove();
//       $("textarea[name=quantity_of_work]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=quantity_of_work]").prev("legend").find("span.el").remove();
//       $("textarea[name=quantity_of_work]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_hours == "" ){
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( special_working_conditions == "" ){
//       $("textarea[name=special_working_conditions]").prev("legend").find("span.el").remove();
//       $("textarea[name=special_working_conditions]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=special_working_conditions]").prev("legend").find("span.el").remove();
//       $("textarea[name=special_working_conditions]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "moving" ){
//   var job_Title = $("#job_title").val();
//
//   var vehicle_required = $("input[name=vehicle_required]:checked").val();
//   var heavy_lifting_involved = $("input[name=heavy_lifting_involved]:checked").val();
//   var how_many_hours = $("input[name=how_many_hours]").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       vehicle_required !== "" && heavy_lifting_involved !== "" && how_many_hours !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( vehicle_required == "" ){
//       $("input[name=vehicle_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=vehicle_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=vehicle_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=vehicle_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( heavy_lifting_involved == "" ){
//       $("input[name=heavy_lifting_involved]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=heavy_lifting_involved]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=heavy_lifting_involved]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=heavy_lifting_involved]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_hours == "" ){
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "music_lessons" ){
//   var job_Title = $("#job_title").val();
//
//   var instrument_to_learn = $("textarea[name=instrument_to_learn]").val();
//   var current_proficiency = $("input[name=current_proficiency]:checked").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       instrument_to_learn !== "" && current_proficiency !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( instrument_to_learn == "" ){
//       $("textarea[name=instrument_to_learn]").prev("legend").find("span.el").remove();
//       $("textarea[name=instrument_to_learn]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=instrument_to_learn]").prev("legend").find("span.el").remove();
//       $("textarea[name=instrument_to_learn]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( current_proficiency == "" ){
//       $("input[name=current_proficiency]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=current_proficiency]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=current_proficiency]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=current_proficiency]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "outdoor_seasonal_decorations" ){
//   var job_Title = $("#job_title").val();
//
//   var outdoor_seasonal_decorations_subservices = $("input[name='outdoor_seasonal_decorations_subservices[]']:checked").length;
//   var floor_area = $("input[name=floor_area]:checked").val();
//   var how_many_stories = $("input[name=how_many_stories]:checked").val();
//   var how_many_hours = $("input[name=how_many_hours]").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       outdoor_seasonal_decorations_subservices !== "0" && floor_area !== "" && how_many_stories !== "" && how_many_hours !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         /********************** Sub service *********************/
//         if( $("input#install_decorations").is(":checked") ){
//           var type_and_amount_to_be_installed = $("textarea[name=type_and_amount_to_be_installed]").val();
//           if( type_and_amount_to_be_installed == "" ){
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#take_down_decorations").is(":checked") ){
//           var type_and_amount_to_be_taken_down = $("textarea[name=type_and_amount_to_be_taken_down]").val();
//           if( type_and_amount_to_be_taken_down == "" ){
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         /********************************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     var outdoor_seasonal_decorations_subservices = $("input[name='outdoor_seasonal_decorations_subservices[]']:checked").length;
//     var floor_area = $("input[name=floor_area]:checked").val();
//     var how_many_stories = $("input[name=how_many_stories]:checked").val();
//     var how_many_hours = $("input[name=how_many_hours]").val();
//
//     if( outdoor_seasonal_decorations_subservices == "0" ){
//       $("input[name='outdoor_seasonal_decorations_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='outdoor_seasonal_decorations_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='outdoor_seasonal_decorations_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='outdoor_seasonal_decorations_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( floor_area == "" ){
//       $("input[name=floor_area]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=floor_area]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=floor_area]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=floor_area]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_stories == "" ){
//       $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       how_many_stories.prev("legend").find("span.el").remove();
//       $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_hours == "" ){
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     /********************** Sub-services *********************/
//     if( $("input#install_decorations").is(":checked") ){
//       var type_and_amount_to_be_installed = $("textarea[name=type_and_amount_to_be_installed]").val();
//       if( type_and_amount_to_be_installed == "" ){
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     if( $("input#take_down_decorations").is(":checked") ){
//       var type_and_amount_to_be_taken_down = $("textarea[name=type_and_amount_to_be_taken_down]").val();
//       if( type_and_amount_to_be_taken_down == "" ){
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").find("span.el").remove();
//         $("textarea[name=type_and_amount_to_be_installed]").prev("legend").prepend("<span class='el el-ok'></span>");
//       }
//     }
//     /********************************************************/
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "painting" ){
//   var job_Title = $("#job_title").val();
//
//   var painting_sub_service = $("input[name='painting_sub_service'] option:checked");
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       painting_sub_service !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//       /******************* Subservices *****************/
//       if( painting_sub_service == "interior" ){
//         var spaces_to_paint_length = $("input[name='spaces_to_paint[]']").length;
//         var surfaces_to_paint_length = $("input[name='surfaces_to_paint[]']").length;
//         var area_to_paint = $("input[name=area_to_paint]").val();
//         var height_of_ceiling = $("input[name=height_of_ceiling]").val();
//         var coats_of_paint = $("input[name=coats_of_paint]").val();
//         var kind_of_paint_length = $("input[name='kind_of_paint[]']").length;
//         var does_room_need_prep = $("input[name=does_room_need_prep]:checked").val();
//         var number_of_hours = $("input[name=number_of_hours]").val();
//
//         if( spaces_to_paint_length == "0" ){
//           $("input[name='spaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='spaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name='spaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='spaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( surfaces_to_paint_length == "0" ){
//           $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( area_to_paint == "" ){
//           $("input[name=area_to_paint]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_to_paint]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_to_paint]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_to_paint]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( height_of_ceiling == "" ){
//           $("input[name=height_of_ceiling]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=height_of_ceiling]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=height_of_ceiling]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=height_of_ceiling]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( coats_of_paint == "" ){
//           $("input[name=coats_of_paint]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=coats_of_paint]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=coats_of_paint]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=coats_of_paint]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( kind_of_paint_length == "0" ){
//           $("input[name='kind_of_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='kind_of_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name='kind_of_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='kind_of_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( does_room_need_prep == "" ){
//           $("input[name=does_room_need_prep]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=does_room_need_prep]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=does_room_need_prep]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=does_room_need_prep]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( number_of_hours == "" ){
//           $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//       }
//       if( painting_sub_service == "exterior" ){
//         var type_of_residence = $("input[name=type_of_residence]:checked").val();
//         var how_many_stories = $("input[name=how_many_stories]:checked").val();
//         var number_of_hours = $("input[name=number_of_hours]").val();
//         var how_many_stories = $("input[name=how_many_stories]:checked").val();
//         var what_to_paint = $("input[name='what_to_paint[]']").length;
//         var how_many_stories = $("input[name=how_many_stories").val();
//         var type_of_exterior = $("textarea[name=type_of_exterior]").val();
//         var number_of_hours = $("input[name=number_of_hours]").val();
//
//         if( type_of_residence == "" ){
//           $("input[name=type_of_residence").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=type_of_residence").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=type_of_residence").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=type_of_residence").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( how_many_stories == "0" ){
//           $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( what_to_paint == "0" ){
//           $("input[name='what_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='what_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name='what_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//           $("input[name='what_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( how_many_stories == "" ){
//           $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( type_of_exterior == "" ){
//           $("textarea[name=type_of_exterior]").prev("legend").find("span.el").remove();
//           $("textarea[name=type_of_exterior]").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("textarea[name=type_of_exterior]").prev("legend").find("span.el").remove();
//           $("textarea[name=type_of_exterior]").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//         if( number_of_hours == "" ){
//           $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//
//       }
//       /*************************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( painting_sub_service == "" ){
//       $("input[name='painting_sub_service']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='painting_sub_service']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='painting_sub_service']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='painting_sub_service']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//         /******************* Subservices *****************/
//         if( painting_sub_service == "interior" ){
//           var spaces_to_paint_length = $("input[name='spaces_to_paint[]']").length;
//           var surfaces_to_paint_length = $("input[name='surfaces_to_paint[]']").length;
//           var area_to_paint = $("input[name=area_to_paint]").val();
//           var height_of_ceiling = $("input[name=height_of_ceiling]").val();
//           var coats_of_paint = $("input[name=coats_of_paint]").val();
//           var kind_of_paint_length = $("input[name='kind_of_paint[]']").length;
//           var does_room_need_prep = $("input[name=does_room_need_prep]:checked").val();
//           var number_of_hours = $("input[name=number_of_hours]").val();
//
//           if( spaces_to_paint_length == "0" ){
//             $("input[name='spaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='spaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='spaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='spaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( surfaces_to_paint_length == "0" ){
//             $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='surfaces_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( area_to_paint == "" ){
//             $("input[name=area_to_paint]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_to_paint]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_to_paint]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_to_paint]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( height_of_ceiling == "" ){
//             $("input[name=height_of_ceiling]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=height_of_ceiling]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=height_of_ceiling]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=height_of_ceiling]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( coats_of_paint == "" ){
//             $("input[name=coats_of_paint]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=coats_of_paint]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=coats_of_paint]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=coats_of_paint]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( kind_of_paint_length == "0" ){
//             $("input[name='kind_of_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='kind_of_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='kind_of_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='kind_of_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( does_room_need_prep == "" ){
//             $("input[name=does_room_need_prep]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=does_room_need_prep]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=does_room_need_prep]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=does_room_need_prep]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( number_of_hours == "" ){
//             $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//         }
//         if( painting_sub_service == "exterior" ){
//           var type_of_residence = $("input[name=type_of_residence]:checked").val();
//           var how_many_stories = $("input[name=how_many_stories]:checked").val();
//           var number_of_hours = $("input[name=number_of_hours]").val();
//           var how_many_stories = $("input[name=how_many_stories]:checked").val();
//           var what_to_paint = $("input[name='what_to_paint[]']").length;
//           var how_many_stories = $("input[name=how_many_stories").val();
//           var type_of_exterior = $("textarea[name=type_of_exterior]").val();
//           var number_of_hours = $("input[name=number_of_hours]").val();
//
//           if( type_of_residence == "" ){
//             $("input[name=type_of_residence").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=type_of_residence").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=type_of_residence").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=type_of_residence").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( how_many_stories == "0" ){
//             $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( what_to_paint == "0" ){
//             $("input[name='what_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='what_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='what_to_paint[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='what_to_paint[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( how_many_stories == "" ){
//             $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_many_stories]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=how_many_stories]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( type_of_exterior == "" ){
//             $("textarea[name=type_of_exterior]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_of_exterior]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=type_of_exterior]").prev("legend").find("span.el").remove();
//             $("textarea[name=type_of_exterior]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//           if( number_of_hours == "" ){
//             $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=number_of_hours]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=number_of_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//
//         }
//         /*************************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "pressure_washing" ){
//   var job_Title = $("#job_title").val();
//
//   var pressure_washing_subservices = $("input[name='pressure_washing_subservices[]']:checked").length;
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       pressure_washing_subservices !== "0" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         /******************** Sub-services ********************/
//         if( $("input#patio_stone_and_walkways").is(":checked") ){
//           var area_to_be_washed = $("input[name=area_to_be_washed]").val();
//           if( area_to_be_washed == "" ){
//             $("input[name=area_to_be_washed]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_to_be_washed]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_to_be_washed]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_to_be_washed]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#driveways").is(":checked") ){
//           var area_of_driveway = $("input[name=materials_provided]:checked").val();
//           if( area_to_be_washed == "" ){
//             $("input[name=materials_provided]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=materials_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=materials_provided]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=materials_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#exterior_walls").is(":checked") ){
//           var type_of_structure = $("select[name=type_of_structure] option:selected").val();
//           var length_of_structure = $("input[name=length_of_structure]").val();
//           var how_many_stories = $("select[name=how_many_stories] option:selected").val();
//           if( type_of_structure == "" ){
//             $("select[name=type_of_structure]").prev("legend").find("span.el").remove();
//             $("select[name=type_of_structure]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=type_of_structure]").prev("legend").find("span.el").remove();
//             $("select[name=type_of_structure]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( length_of_structure == "" ){
//             $("input[name=length_of_structure]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=length_of_structure]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=length_of_structure]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=length_of_structure]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( how_many_stories == "" ){
//             $("select[name=how_many_stories]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_stories]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=how_many_stories]").prev("legend").find("span.el").remove();
//             $("select[name=how_many_stories]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#deck_surfaces").is(":checked") ){
//           var area_of_deck = $("input[name=area_of_deck]").val();
//           if( area_of_deck == "" ){
//             $("input[name=area_of_deck]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_deck]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_deck]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_deck]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#fences").is(":checked") ){
//           var length_of_fence = $("input[name=length_of_fence]").val();
//           var height_of_fence = $("input[name=height_of_fence]").val();
//           var sides_of_fence_to_wash = $("select[name=sides_of_fence_to_wash] option:selected").val();
//           if( length_of_fence == "" ){
//             $("input[name=length_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=length_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=length_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=length_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( height_of_fence == "" ){
//             $("input[name=height_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=height_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=height_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=height_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( sides_of_fence_to_wash == "" ){
//             $("select[name=sides_of_fence_to_wash]").prev("legend").find("span.el").remove();
//             $("select[name=sides_of_fence_to_wash]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=sides_of_fence_to_wash]").prev("legend").find("span.el").remove();
//             $("select[name=sides_of_fence_to_wash]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#other_pressure_washing").is(":checked") ){
//           var describe_surface_to_be_washed = $("textarea[name=describe_surface_to_be_washed]").val();
//           var area_of_surface = $("input[name=area_of_surface]").val();
//           var how_many_hours = $("input[name=how_many_hours]").val();
//           if( describe_surface_to_be_washed == "" ){
//             $("textarea[name=describe_surface_to_be_washed]").prev("legend").find("span.el").remove();
//             $("textarea[name=describe_surface_to_be_washed]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=describe_surface_to_be_washed]").prev("legend").find("span.el").remove();
//             $("textarea[name=describe_surface_to_be_washed]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( area_of_surface == "" ){
//             $("input[name=area_of_surface]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=area_of_surface]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_surface]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=area_of_surface]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( how_many_hours == "" ){
//             $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         /*******************************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( pressure_washing_subservices == "0" ){
//       $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     /******************** Sub-services ********************/
//           if( $("input#patio_stone_and_walkways").is(":checked") ){
//             var area_to_be_washed = $("input[name=area_to_be_washed]").val();
//             if( area_to_be_washed == "" ){
//               $("input[name=area_to_be_washed]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=area_to_be_washed]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=area_to_be_washed]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=area_to_be_washed]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#driveways").is(":checked") ){
//             var area_of_driveway = $("input[name=materials_provided]:checked").val();
//             if( area_to_be_washed == "" ){
//               $("input[name=materials_provided]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=materials_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=materials_provided]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=materials_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#exterior_walls").is(":checked") ){
//             var type_of_structure = $("select[name=type_of_structure] option:selected").val();
//             var length_of_structure = $("input[name=length_of_structure]").val();
//             var how_many_stories = $("select[name=how_many_stories] option:selected").val();
//             if( type_of_structure == "" ){
//               $("select[name=type_of_structure]").prev("legend").find("span.el").remove();
//               $("select[name=type_of_structure]").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("select[name=type_of_structure]").prev("legend").find("span.el").remove();
//               $("select[name=type_of_structure]").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( length_of_structure == "" ){
//               $("input[name=length_of_structure]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=length_of_structure]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=length_of_structure]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=length_of_structure]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( how_many_stories == "" ){
//               $("select[name=how_many_stories]").prev("legend").find("span.el").remove();
//               $("select[name=how_many_stories]").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("select[name=how_many_stories]").prev("legend").find("span.el").remove();
//               $("select[name=how_many_stories]").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#deck_surfaces").is(":checked") ){
//             var area_of_deck = $("input[name=area_of_deck]").val();
//             if( area_of_deck == "" ){
//               $("input[name=area_of_deck]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=area_of_deck]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=area_of_deck]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=area_of_deck]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#fences").is(":checked") ){
//             var length_of_fence = $("input[name=length_of_fence]").val();
//             var height_of_fence = $("input[name=height_of_fence]").val();
//             var sides_of_fence_to_wash = $("select[name=sides_of_fence_to_wash] option:selected").val();
//             if( length_of_fence == "" ){
//               $("input[name=length_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=length_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=length_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=length_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( height_of_fence == "" ){
//               $("input[name=height_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=height_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=height_of_fence]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=height_of_fence]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( sides_of_fence_to_wash == "" ){
//               $("select[name=sides_of_fence_to_wash]").prev("legend").find("span.el").remove();
//               $("select[name=sides_of_fence_to_wash]").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("select[name=sides_of_fence_to_wash]").prev("legend").find("span.el").remove();
//               $("select[name=sides_of_fence_to_wash]").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#other_pressure_washing").is(":checked") ){
//             var describe_surface_to_be_washed = $("textarea[name=describe_surface_to_be_washed]").val();
//             var area_of_surface = $("input[name=area_of_surface]").val();
//             var how_many_hours = $("input[name=how_many_hours]").val();
//             if( describe_surface_to_be_washed == "" ){
//               $("textarea[name=describe_surface_to_be_washed]").prev("legend").find("span.el").remove();
//               $("textarea[name=describe_surface_to_be_washed]").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("textarea[name=describe_surface_to_be_washed]").prev("legend").find("span.el").remove();
//               $("textarea[name=describe_surface_to_be_washed]").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( area_of_surface == "" ){
//               $("input[name=area_of_surface]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=area_of_surface]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=area_of_surface]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=area_of_surface]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( how_many_hours == "" ){
//               $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=how_many_hours]").parent("fieldset").prev("legend").find("span.el").remove();
//               $("input[name=how_many_hours]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           /*******************************************************/
//
//     if( number_of_items == "" ){
//       $("input[name=number_of_items]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=number_of_items]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=number_of_items]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=number_of_items]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( percentage_requiring_ladder == "" ){
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").find("span.el").remove();
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").find("span.el").remove();
//       $("textarea[name=percentage_requiring_ladder]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( avg_size_of_windows == "" ){
//       $("input[name=avg_size_of_windows]").prev("legend").find("span.el").remove();
//       $("input[name=avg_size_of_windows]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=avg_size_of_windows]").prev("legend").find("span.el").remove();
//       $("input[name=avg_size_of_windows]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "private_event_assistance" ){
//   var job_Title = $("#job_title").val();
//
//   var private_event_assistance_subservices_length = $("input[name='private_event_assistance_subservices[]']:checked").length;
//   var type_of_event = $("textarea[name=type_of_event]").val();
//   var how_many_guests = $("input[name=how_many_guests]").val();
//   var how_many_hours = $("input[name=how_many_hours]").val();
//   var describe_duties = $("textarea[name=describe_duties]").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       private_event_assistance_subservices_length !== "0" && type_of_event !== "" && how_many_guests !== "" &&
//       how_many_hours !== "" && describe_duties !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( private_event_assistance_subservices_length == "" ){
//       $("input[name='private_event_assistance_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='private_event_assistance_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='private_event_assistance_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='private_event_assistance_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( type_of_event == "" ){
//       $("textarea[name=type_of_event]").prev("legend").find("span.el").remove();
//       $("textarea[name=type_of_event]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=type_of_event]").prev("legend").find("span.el").remove();
//       $("textarea[name=type_of_event]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_guests == "" ){
//       $("input[name=how_many_guests]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_guests]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_guests]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_guests]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( how_many_hours == "" ){
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=how_many_hours]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=how_many_hours]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( describe_duties == "" ){
//       $("textarea[name=describe_duties]").prev("legend").find("span.el").remove();
//       $("textarea[name=describe_duties]").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=describe_duties]").prev("legend").find("span.el").remove();
//       $("textarea[name=describe_duties]").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "rv_boat_cleaning" ){
//   var job_Title = $("#job_title").val();
//
//   var rv_boat_cleaning_subservices_length = $("input[name='rv_boat_cleaning_subservices[]']:checked").length;
//   var type_of_vehicle = $("input[name=type_of_vehicle]:checked").val();
//   var length_of_vehicle = $("input[name=length_of_vehicle]:checked").val();
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       rv_boat_cleaning_subservices_length !== "0" && type_of_vehicle !== "" && length_of_vehicle !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//         /********************* Subservices *******************/
//         if( $("input#interior_quick_cleanup_package").is(":checked") ){
//           var vehicle_amenities_interior_quick_cleanup_package = $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").length;
//           var floor_carpet_area_interior_quick_cleanup_package = $("input[name=floor_carpet_area_interior_quick_cleanup_package]:checked").val();
//           var current_state_of_space_interior_quick_cleanup_package = $("input[name=current_state_of_space_interior_quick_cleanup_package]:checked").val();
//           if( vehicle_amenities_interior_quick_cleanup_package == "0" ){
//             $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( floor_carpet_area_interior_quick_cleanup_package == "" ){
//             $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( current_state_of_space_interior_quick_cleanup_package == "" ){
//             $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#interior_full_cleaning_package").is(":checked") ){
//           var vehicle_amenities_interior_full_cleaning_package = $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").length;
//           var floor_carpet_area_interior_full_cleaning_package = $("input[name=floor_carpet_area_interior_full_cleaning_package]:checked").val();
//           var current_state_of_space_interior_full_cleaning_package = $("input[name=current_state_of_space_interior_full_cleaning_package]:checked").val();
//           if( vehicle_amenities_interior_full_cleaning_package == "0" ){
//             $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").find("span.el").remove();
//             $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( floor_carpet_area_interior_full_cleaning_package == "" ){
//             $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( current_state_of_space_interior_full_cleaning_package == "" ){
//             $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#othe_rv_boat_cleaning").is(":checked") ){
//           var what_to_clear_othe_rv_boat_cleaning = $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").val();
//           var how_many_hours_othe_rv_boat_cleaning = $("input[name=how_many_hours_othe_rv_boat_cleaning]").val();
//           if( what_to_clear_othe_rv_boat_cleaning == "" ){
//             $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").find("span.el").remove();
//             $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").find("span.el").remove();
//             $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( how_many_hours_othe_rv_boat_cleaning == "" ){
//             $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").find("span.el").remove();
//             $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         /******************************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     var rv_boat_cleaning_subservices_length = $("input[name='rv_boat_cleaning_subservices[]']:checked").length;
//     var type_of_vehicle = $("input[name=type_of_vehicle]:checked").val();
//     var length_of_vehicle = $("input[name=length_of_vehicle]:checked").val();
//
//     if( rv_boat_cleaning_subservices_length == "0" ){
//       $("input[name='rv_boat_cleaning_subservices[]']").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name='rv_boat_cleaning_subservices[]']").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='rv_boat_cleaning_subservices[]']").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name='rv_boat_cleaning_subservices[]']").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( type_of_vehicle == "" ){
//       $("input[name=type_of_vehicle]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=type_of_vehicle]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=type_of_vehicle]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=type_of_vehicle]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( length_of_vehicle == "" ){
//       $("input[name=length_of_vehicle]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=length_of_vehicle]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=length_of_vehicle]").parent("fieldset").prev("legend").find("span.el").remove();
//       $("input[name=length_of_vehicle]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     /********************* Subservices *******************/
//           if( $("input#interior_quick_cleanup_package").is(":checked") ){
//             var vehicle_amenities_interior_quick_cleanup_package = $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").length;
//             var floor_carpet_area_interior_quick_cleanup_package = $("input[name=floor_carpet_area_interior_quick_cleanup_package]:checked").val();
//             var current_state_of_space_interior_quick_cleanup_package = $("input[name=current_state_of_space_interior_quick_cleanup_package]:checked").val();
//             if( vehicle_amenities_interior_quick_cleanup_package == "0" ){
//               $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").find("span.el").remove();
//               $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").find("span.el").remove();
//               $("input[name='vehicle_amenities_interior_quick_cleanup_package[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( floor_carpet_area_interior_quick_cleanup_package == "" ){
//               $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=floor_carpet_area_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( current_state_of_space_interior_quick_cleanup_package == "" ){
//               $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=current_state_of_space_interior_quick_cleanup_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#interior_full_cleaning_package").is(":checked") ){
//             var vehicle_amenities_interior_full_cleaning_package = $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").length;
//             var floor_carpet_area_interior_full_cleaning_package = $("input[name=floor_carpet_area_interior_full_cleaning_package]:checked").val();
//             var current_state_of_space_interior_full_cleaning_package = $("input[name=current_state_of_space_interior_full_cleaning_package]:checked").val();
//             if( vehicle_amenities_interior_full_cleaning_package == "0" ){
//               $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").find("span.el").remove();
//               $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").find("span.el").remove();
//               $("input[name='vehicle_amenities_interior_full_cleaning_package[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( floor_carpet_area_interior_full_cleaning_package == "" ){
//               $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=floor_carpet_area_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//             if( current_state_of_space_interior_full_cleaning_package == "" ){
//               $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").find("span.el").remove();
//               $("input[name=current_state_of_space_interior_full_cleaning_package]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//             }
//           }
//           if( $("input#othe_rv_boat_cleaning").is(":checked") ){
//             var what_to_clear_othe_rv_boat_cleaning = $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").val();
//             var how_many_hours_othe_rv_boat_cleaning = $("input[name=how_many_hours_othe_rv_boat_cleaning]").val();
//             if( $("input#othe_rv_boat_cleaning").is(":checked") ){
//               var what_to_clear_othe_rv_boat_cleaning = $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").val();
//               var how_many_hours_othe_rv_boat_cleaning = $("input[name=how_many_hours_othe_rv_boat_cleaning]").val();
//               if( what_to_clear_othe_rv_boat_cleaning == "" ){
//                 $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").find("span.el").remove();
//                 $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").prepend("<span class='el el-remove'></span>");
//                 alert("Please fill up all necessary fields");
//                 return false;
//               }else{
//                 $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").find("span.el").remove();
//                 $("textarea[name=what_to_clear_othe_rv_boat_cleaning]").prev("legend").prepend("<span class='el el-ok'></span>");
//               }
//               if( how_many_hours_othe_rv_boat_cleaning == "" ){
//                 $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").find("span.el").remove();
//                 $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").prepend("<span class='el el-remove'></span>");
//                 alert("Please fill up all necessary fields");
//                 return false;
//               }else{
//                 $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").find("span.el").remove();
//                 $("input[name=how_many_hours_othe_rv_boat_cleaning]").parent("fieldset").prev("legend").prepend("<span class='el el-ok'></span>");
//               }
//           }
//           /******************************************************/
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "snow_removal" ){
//   var job_Title = $("#job_title").val();
//
//   var snow_removal_subservices_length = $("input[name='snow_removal_subservices[]']:checked").length;
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       snow_removal_subservices_length !== "0" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//
//       /*********************** Subservies *************************/
//       if( $("input#shovel_driveway").is(":checked") ){
//         var area_of_driveway_shovel_driveway = $("input[name=area_of_driveway_shovel_driveway]:checked").val();
//         var depth_of_snow_shovel_driveway = $("input[name=depth_of_snow_shovel_driveway]:checked").val();
//         var steepness_of_surface_shovel_driveway = $("input[name=steepness_of_surface_shovel_driveway]:checked").val();
//         if( area_of_driveway_shovel_driveway == "" ){
//           $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( depth_of_snow_shovel_driveway == "" ){
//           $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( steepness_of_surface_shovel_driveway == "" ){
//           $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#gravel_salt_driveway").is(":checked") ){
//         var area_of_driveway_gravel_salt_driveway = $("input[name=area_of_driveway_gravel_salt_driveway]:checked").val();
//         if( area_of_driveway_gravel_salt_driveway == "" ){
//           $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#shovel_walkways").is(":checked") ){
//         var area_of_walkways_shovel_walkways = $("input[name=area_of_walkways_shovel_walkways]").val();
//         var depth_of_snow_shovel_walkways = $("input[name=depth_of_snow_shovel_walkways]:checked").val();
//         if( area_of_walkways_shovel_walkways == "" ){
//           $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( depth_of_snow_shovel_walkways == "" ){
//           $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#gravel_salt_walkways").is(":checked") ){
//         var area_of_walkways_gravel_salt_walkways = $("input[name=area_of_walkways_gravel_salt_walkways]").val();
//         if( area_of_walkways_gravel_salt_walkways == "" ){
//           $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#shovel_sidewalk").is(":checked") ){
//         var area_of_walkways_shovel_sidewalk = $("input[name=area_of_walkways_shovel_sidewalk]").val();
//         var depth_of_snow_shovel_sidewalk = $("input[name=depth_of_snow_shovel_sidewalk]:checked").val();
//         if( area_of_walkways_shovel_sidewalk == "" ){
//           $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( depth_of_snow_shovel_sidewalk == "" ){
//           $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#gravel_salt_sidewalk").is(":checked") ){
//         var area_of_walkways_gravel_salt_sidewalk = $("input[name=area_of_walkways_gravel_salt_sidewalk]").val();
//         if( area_of_walkways_gravel_salt_sidewalk == "" ){
//           $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#shovel_patios_and_decks").is(":checked") ){
//         var area_of_walkways_shovel_patios_and_decks = $("input[name=area_of_walkways_shovel_patios_and_decks]").val();
//         var depth_of_snow_shovel_patios_and_decks = $("input[name=depth_of_snow_shovel_patios_and_decks]:checked").val();
//         if( area_of_walkways_shovel_patios_and_decks == "" ){
//           $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( depth_of_snow_shovel_patios_and_decks == "" ){
//           $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#gravel_salt_patios_and_decks").is(":checked") ){
//         var area_of_walkways_gravel_salt_patios_and_decks = $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").val();
//         if( area_of_walkways_gravel_salt_patios_and_decks == "" ){
//           $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       if( $("input#break_and_remove_surface_ice_build_up").is(":checked") ){
//         var area_of_walkways_break_and_remove_surface_ice_build_up = $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").val();
//         var depth_of_snow_break_and_remove_surface_ice_build_up = $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]:checked").val();
//         if( area_of_walkways_break_and_remove_surface_ice_build_up == "" ){
//           $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//         if( depth_of_snow_break_and_remove_surface_ice_build_up == "" ){
//           $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//           alert("Please fill up all necessary fields");
//           return false;
//         }else{
//           $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//           $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//         }
//       }
//       /************************************************************/
//
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( snow_removal_subservices_length == "0" ){
//       $("input[name='snow_removal_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='snow_removal_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='snow_removal_subservices[]']").parent("label").prev("legend").find("span.el").remove();
//       $("input[name='snow_removal_subservices[]']").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     /*********************** Subservies *************************/
//         if( $("input#shovel_driveway").is(":checked") ){
//           var area_of_driveway_shovel_driveway = $("input[name=area_of_driveway_shovel_driveway]:checked").val();
//           var depth_of_snow_shovel_driveway = $("input[name=depth_of_snow_shovel_driveway]:checked").val();
//           var steepness_of_surface_shovel_driveway = $("input[name=steepness_of_surface_shovel_driveway]:checked").val();
//           if( area_of_driveway_shovel_driveway == "" ){
//             $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_driveway_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( depth_of_snow_shovel_driveway == "" ){
//             $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( steepness_of_surface_shovel_driveway == "" ){
//             $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=steepness_of_surface_shovel_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#gravel_salt_driveway").is(":checked") ){
//           var area_of_driveway_gravel_salt_driveway = $("input[name=area_of_driveway_gravel_salt_driveway]:checked").val();
//           if( area_of_driveway_gravel_salt_driveway == "" ){
//             $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_driveway_gravel_salt_driveway]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#shovel_walkways").is(":checked") ){
//           var area_of_walkways_shovel_walkways = $("input[name=area_of_walkways_shovel_walkways]").val();
//           var depth_of_snow_shovel_walkways = $("input[name=depth_of_snow_shovel_walkways]:checked").val();
//           if( area_of_walkways_shovel_walkways == "" ){
//             $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( depth_of_snow_shovel_walkways == "" ){
//             $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#gravel_salt_walkways").is(":checked") ){
//           var area_of_walkways_gravel_salt_walkways = $("input[name=area_of_walkways_gravel_salt_walkways]").val();
//           if( area_of_walkways_gravel_salt_walkways == "" ){
//             $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_walkways]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#shovel_sidewalk").is(":checked") ){
//           var area_of_walkways_shovel_sidewalk = $("input[name=area_of_walkways_shovel_sidewalk]").val();
//           var depth_of_snow_shovel_sidewalk = $("input[name=depth_of_snow_shovel_sidewalk]:checked").val();
//           if( area_of_walkways_shovel_sidewalk == "" ){
//             $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( depth_of_snow_shovel_sidewalk == "" ){
//             $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#gravel_salt_sidewalk").is(":checked") ){
//           var area_of_walkways_gravel_salt_sidewalk = $("input[name=area_of_walkways_gravel_salt_sidewalk]").val();
//           if( area_of_walkways_gravel_salt_sidewalk == "" ){
//             $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_sidewalk]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#shovel_patios_and_decks").is(":checked") ){
//           var area_of_walkways_shovel_patios_and_decks = $("input[name=area_of_walkways_shovel_patios_and_decks]").val();
//           var depth_of_snow_shovel_patios_and_decks = $("input[name=depth_of_snow_shovel_patios_and_decks]:checked").val();
//           if( area_of_walkways_shovel_patios_and_decks == "" ){
//             $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( depth_of_snow_shovel_patios_and_decks == "" ){
//             $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_shovel_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#gravel_salt_patios_and_decks").is(":checked") ){
//           var area_of_walkways_gravel_salt_patios_and_decks = $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").val();
//           if( area_of_walkways_gravel_salt_patios_and_decks == "" ){
//             $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_gravel_salt_patios_and_decks]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         if( $("input#break_and_remove_surface_ice_build_up").is(":checked") ){
//           var area_of_walkways_break_and_remove_surface_ice_build_up = $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").val();
//           var depth_of_snow_break_and_remove_surface_ice_build_up = $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]:checked").val();
//           if( area_of_walkways_break_and_remove_surface_ice_build_up == "" ){
//             $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=area_of_walkways_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//           if( depth_of_snow_break_and_remove_surface_ice_build_up == "" ){
//             $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").find("span.el").remove();
//             $("input[name=depth_of_snow_break_and_remove_surface_ice_build_up]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//           }
//         }
//         /************************************************************/
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "tutoring" ){
//   var job_Title = $("#job_title").val();
//
//   var level_of_education = $("input[name=level_of_education]:checked").val();
//   var topic = $("textarea[name=topic]").val();
//   var level_grade_studying = $("textarea[name=level_grade_studying]").val();
//   var objectives_for_session = $("input[name=objectives_for_session]:checked").val();
//
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       level_of_education !== "" && topic !== "" && level_grade_studying !== "" &&
//       objectives_for_session !== "" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( level_of_education == "" ){
//       $("input[name=level_of_education]").parent("fieldset").prev("span.el").remove();
//       $("input[name=level_of_education]").parent("fieldset").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=level_of_education]").parent("fieldset").prev("span.el").remove();
//       $("input[name=level_of_education]").parent("fieldset").before("<span class='el el-ok'></span>");
//     }
//
//     if( topic == "" ){
//       $("textarea[name=topic]").prev("span.el").remove();
//       $("textarea[name=topic]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=topic]").prev("span.el").remove();
//       $("textarea[name=topic]").before("<span class='el el-ok'></span>");
//     }
//
//     if( level_grade_studying == "" ){
//       $("textarea[name=level_grade_studying]").prev("span.el").remove();
//       $("textarea[name=level_grade_studying]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("textarea[name=level_grade_studying]").prev("span.el").remove();
//       $("textarea[name=level_grade_studying]").before("<span class='el el-ok'></span>");
//     }
//
//     if( objectives_for_session == "" ){
//       $("input[name=objectives_for_session]").parent("fieldset").prev("span.el").remove();
//       $("input[name=objectives_for_session]").parent("fieldset").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=objectives_for_session]").parent("fieldset").prev("span.el").remove();
//       $("input[name=objectives_for_session]").parent("fieldset").before("<span class='el el-ok'></span>");
//     }
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/
//
//
//
//
// /*********************************************************************************************************/
// if( select == "vehicle_care" ){
//   var job_Title = $("#job_title").val();
//
//   var vehicle_care_subservices_length = $("input[name='vehicle_care_subservices[]']:checked").length;
//
//   if( $("input[name=equipment_provided]").is(":checked") ){
//     var equipment_provided = $("input[name=equipment_provided]:checked").val();
//   }else{
//     var equipment_provided = "";
//   }
//
//   if( $("input[name=materials_provided]").is(":checked") ){
//     var materials_required = $("input[name=materials_provided]:checked").val();
//   }else{
//     var materials_required = "";
//   }
//
//   var address_of_service_name = $("input[name=address_of_service_name]").val();
//   var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();
//   var time_of_service_hours = $("input[name=time_of_service_hours]").val();
//   var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
//   var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();
//
//
//   if( job_Title !== "" && $("input.date_of_venue").val() !== "" &&
//       vehicle_care_subservices_length !== "0" &&
//       equipment_provided !== "" && materials_required !== "" && address_of_service_name !== "" &&
//       address_of_service_postal_code !== "" && time_of_service_hours !== "" && time_of_service_minutes !== "" ){
//
//
//         /***************** Subservices *****************/
//         if( $("input#wash").is(":checked") || $("input#was_and_polish").is(":checked") || $("input#vacuum_and_clean").is(":checked") ){
//           var type_of_vehicle = $("select[name=type_of_vehicle] option:selected").val();
//           var location_of_vehicle = $("input[name=location_of_vehicle]:checked").val();
//           var services_to_do_on_vehicle = $("input[name='services_to_do_on_vehicle[]']").length;
//           if( type_of_vehicle == "" ){
//             $("select[name=type_of_vehicle]").prev("span.el").remove();
//             $("select[name=type_of_vehicle]").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("select[name=type_of_vehicle]").prev("span.el").remove();
//             $("select[name=type_of_vehicle]").before("<span class='el el-ok'></span>");
//           }
//           if( location_of_vehicle == "" ){
//             $("input[name=location_of_vehicle]").parent("fieldset").prev("span.el").remove();
//             $("input[name=location_of_vehicle]").parent("fieldset").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name=location_of_vehicle]").parent("fieldset").prev("span.el").remove();
//             $("input[name=location_of_vehicle]").parent("fieldset").before("<span class='el el-ok'></span>");
//           }
//           if( services_to_do_on_vehicle == "0" ){
//             $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").prev("span.el").remove();
//             $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").before("<span class='el el-remove'></span>");
//             alert("Please fill up all necessary fields");
//             return false;
//           }else{
//             $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").prev("span.el").remove();
//             $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").before("<span class='el el-ok'></span>");
//           }
//         }
//         /***********************************************/
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( validate_date(date_of_venue) ){
//         $("span.el").remove();
//         $(this).before("<span class='el el-ok'></span>");
//         valid = true;
//       }else{
//         $("span.el").remove();
//         $(this).before("<span class='el el-remove'></span>");
//         valid = false;
//       }
//     })
//
//     if( !validate_postalCode(address_of_service_postal_code) ){
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       return false;
//     }else{
//       $("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//     }
//
//     if( validate_time_of_service_hours(time_of_service_hours) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     if( validate_time_of_service_minutes(time_of_service_minutes) ){
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//     }else{
//       $("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       return false;
//     }
//
//     return valid;
//
//   }else{
//
//     if( vehicle_care_subservices_length == "0" ){
//       $("input[name='vehicle_care_subservices[]']").parent("fieldset").prev("span.el").remove();
//       $("input[name='vehicle_care_subservices[]']").parent("fieldset").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name='vehicle_care_subservices[]']").parent("fieldset").prev("span.el").remove();
//       $("input[name='vehicle_care_subservices[]']").parent("fieldset").before("<span class='el el-ok'></span>");
//     }
//
//       /***************** Subservices *****************/
//           if( $("input#wash").is(":checked") || $("input#was_and_polish").is(":checked") || $("input#vacuum_and_clean").is(":checked") ){
//             var type_of_vehicle = $("select[name=type_of_vehicle] option:selected").val();
//             var location_of_vehicle = $("input[name=location_of_vehicle]:checked").val();
//             var services_to_do_on_vehicle = $("input[name='services_to_do_on_vehicle[]']").length;
//             if( type_of_vehicle == "" ){
//               $("select[name=type_of_vehicle]").prev("span.el").remove();
//               $("select[name=type_of_vehicle]").before("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("select[name=type_of_vehicle]").prev("span.el").remove();
//               $("select[name=type_of_vehicle]").before("<span class='el el-ok'></span>");
//             }
//             if( location_of_vehicle == "" ){
//               $("input[name=location_of_vehicle]").parent("fieldset").prev("span.el").remove();
//               $("input[name=location_of_vehicle]").parent("fieldset").before("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name=location_of_vehicle]").parent("fieldset").prev("span.el").remove();
//               $("input[name=location_of_vehicle]").parent("fieldset").before("<span class='el el-ok'></span>");
//             }
//             if( services_to_do_on_vehicle == "0" ){
//               $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").prev("span.el").remove();
//               $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").before("<span class='el el-remove'></span>");
//               alert("Please fill up all necessary fields");
//               return false;
//             }else{
//               $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").prev("span.el").remove();
//               $("input[name='services_to_do_on_vehicle[]']").parent("fieldset").before("<span class='el el-ok'></span>");
//             }
//           }
//           /***********************************************/
//
//
//     if( equipment_provided == "" ){
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=equipment_provided]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=equipment_provided]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( materials_required == "" ){
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=materials_required]").parent("label").prev("legend").find("span.el").remove();
//       $("input[name=materials_required]").parent("label").prev("legend").prepend("<span class='el el-ok'></span>");
//     }
//
//     if( address_of_service_name == "" ){
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       $("input[name=address_of_service_name]").prev("span.el").remove();
//       $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
//     }
//
//     var valid;
//     $("input.date_of_venue").each(function(){
//       var date_of_venue = $(this).val();
//       if( $("input.date_of_venue").val() == "" ){
//         $("span.el").remove();
//         $("input.date_of_venue").before("<span class='el el-remove'></span>");
//       }else{
//         if( validate_date(date_of_venue) ){
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-ok'></span>");
//         }else{
//           $("span.el").remove();
//           $("input.date_of_venue").before("<span class='el el-remove'></span>");
//         }
//       }
//     })
//
//     if( address_of_service_postal_code == "" ){
//       $("input[name=address_of_service_postal_code]").find("span.el").remove();
//       $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( !validate_postalCode(address_of_service_postal_code) ){
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }else{
//         $("input[name=address_of_service_postal_code]").find("span.el").remove();
//         $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
//       }
//     }
//
//     if( time_of_service_hours == "" ){
//       $("input[name=time_of_service_hours]").find("span.el").remove();
//       $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_hours(time_of_service_hours) ){
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_hours]").find("span.el").remove();
//         $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     if( time_of_service_minutes == "" ){
//       $("input[name=time_of_service_minutes]").find("span.el").remove();
//       $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//       alert("Please fill up all necessary fields");
//       return false;
//     }else{
//       if( validate_time_of_service_minutes(time_of_service_minutes) ){
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
//       }else{
//         $("input[name=time_of_service_minutes]").find("span.el").remove();
//         $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
//         alert("Please fill up all necessary fields");
//         return false;
//       }
//     }
//
//     return valid;
//
//   }
// }
// /*********************************************************************************************************/




/*********************************************************************************************************/
// if( select == "other" ){
  var job_Title = $("#job_title").val();

  var task_description = $("textarea[name=task_description]").val();
  var how_many_hours = $("input[name=how_many_hours]").val();

  if( $("input[name=equipment_provided]").is(":checked") ){
    var equipment_provided = $("input[name=equipment_provided]:checked").val();
  }else{
    var equipment_provided = "";
  }

  var description_of_materials_required = $("textarea[name=description_of_materials_required]").val();

  var time_of_service_hours = $("input[name=time_of_service_hours]").val();
  var time_of_service_minutes = $("input[name=time_of_service_minutes]").val();
  var time_of_service_am_pm = $("select[name=time_of_service_am_pm] option:selected").val();

  var flexibility_of_date_time = $("textarea[name=flexibility_of_date_time]").val();

  var address_of_service_name = $("input[name=address_of_service_name]").val();
  var address_of_service_postal_code = $("input[name=address_of_service_postal_code]").val();

  if( select !== "" && job_Title !== "" && task_description !== "" &&
      how_many_hours !== "" && equipment_provided !== "" &&
      description_of_materials_required !== "" && $("input.date_of_venue").val() !== "" &&
      time_of_service_hours !== "" && time_of_service_minutes !== "" &&
      time_of_service_am_pm !== "" && task_description !== "" &&
      address_of_service_name !== "" && address_of_service_postal_code !== "" ){

    var valid;
    $("input.date_of_venue").each(function(){
      var date_of_venue = $(this).val();
      if( validate_date(date_of_venue) ){
        $("span.el").remove();
        $(this).before("<span class='el el-ok'></span>");
        valid = true;
      }else{
        $("span.el").remove();
        $(this).before("<span class='el el-remove'></span>");
        valid = false;
      }
    })

    if( validate_time_of_service_hours(time_of_service_hours) ){
      $("span.el").remove();
      $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
    }else{
      $("span.el").remove();
      $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
      return false;
    }

    if( validate_time_of_service_minutes(time_of_service_minutes) ){
      $("span.el").remove();
      $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
    }else{
      $("span.el").remove();
      $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
      return false;
    }


    if( !validate_postalCode(address_of_service_postal_code) ){
      $("span.el").remove();
      $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
      return false;
    }else{
      $("span.el").remove();
      $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
    }

    return valid;

  }else{

    if( select == "" ){
      $("select[name=job_category]").prev("legend").find("span.el").remove();
      $("select[name=job_category]").prev("legend").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("select[name=job_category]").prev("legend").find("span.el").remove();
      $("select[name=job_category]").prev("legend").prepend("<span class='el el-ok'></span>");
    }

    if( job_Title == "" ){
      $("input[name=job_Title]").prev("legend").find("span.el").remove();
      $("input[name=job_Title]").prev("legend").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("input[name=job_Title]").prev("legend").find("span.el").remove();
      $("input[name=job_Title]").prev("legend").prepend("<span class='el el-ok'></span>");
    }

    if( task_description == "" ){
      $("textarea[name=task_description]").prev("legend").find("span.el").remove();
      $("textarea[name=task_description]").prev("legend").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("textarea[name=task_description]").prev("legend").find("span.el").remove();
      $("textarea[name=task_description]").prev("legend").prepend("<span class='el el-ok'></span>");
    }

    if( how_many_hours == "" ){
      $("input[name=how_many_hours]").prev("label").find("span.el").remove();
      $("input[name=how_many_hours]").prev("label").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("input[name=how_many_hours]").prev("label").find("span.el").remove();
      $("input[name=how_many_hours]").prev("label").prepend("<span class='el el-ok'></span>");
    }

    if( equipment_provided == "" ){
      $("input[name=equipment_provided]").parent("label").parent("div").find("span.el").remove();
      $("input[name=equipment_provided]").parent("label").parent("div").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("input[name=equipment_provided]").parent("label").parent("div").find("span.el").remove();
      $("input[name=equipment_provided]").parent("label").parent("div").prepend("<span class='el el-ok'></span>");
    }

    if( description_of_materials_required == "" ){
      $("textarea[name=description_of_materials_required]").prev("label").find("span.el").remove();
      $("textarea[name=description_of_materials_required]").prev("label").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("textarea[name=description_of_materials_required]").prev("label").find("span.el").remove();
      $("textarea[name=description_of_materials_required]").prev("label").prepend("<span class='el el-ok'></span>");
    }

    if( time_of_service_hours == "" ){
      $("input[name=time_of_service_hours]").find("span.el").remove();
      $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      if( validate_time_of_service_hours(time_of_service_hours) ){
        $("input[name=time_of_service_hours]").find("span.el").remove();
        $("input[name=time_of_service_hours]").before("<span class='el el-ok'></span>");
      }else{
        $("input[name=time_of_service_hours]").find("span.el").remove();
        $("input[name=time_of_service_hours]").before("<span class='el el-remove'></span>");
        alert("Please fill up all necessary fields");
        return false;
      }
    }

    if( time_of_service_minutes == "" ){
      $("input[name=time_of_service_minutes]").find("span.el").remove();
      $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      if( validate_time_of_service_minutes(time_of_service_minutes) ){
        $("input[name=time_of_service_minutes]").find("span.el").remove();
        $("input[name=time_of_service_minutes]").before("<span class='el el-ok'></span>");
      }else{
        $("input[name=time_of_service_minutes]").find("span.el").remove();
        $("input[name=time_of_service_minutes]").before("<span class='el el-remove'></span>");
        alert("Please fill up all necessary fields");
        return false;
      }
    }

    if( flexibility_of_date_time == "" ){
      $("textarea[name=flexibility_of_date_time]").prev("legend").find("span.el").remove();
      $("textarea[name=flexibility_of_date_time]").prev("legend").prepend("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("textarea[name=flexibility_of_date_time]").prev("legend").find("span.el").remove();
      $("textarea[name=flexibility_of_date_time]").prev("legend").prepend("<span class='el el-ok'></span>");
    }

    if( address_of_service_name == "" ){
      $("input[name=address_of_service_name]").prev("span.el").remove();
      $("input[name=address_of_service_name]").before("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      $("input[name=address_of_service_name]").prev("span.el").remove();
      $("input[name=address_of_service_name]").before("<span class='el el-ok'></span>");
    }

    if( address_of_service_postal_code == "" ){
      $("input[name=address_of_service_postal_code]").find("span.el").remove();
      $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
      alert("Please fill up all necessary fields");
      return false;
    }else{
      if( !validate_postalCode(address_of_service_postal_code) ){
        $("input[name=address_of_service_postal_code]").find("span.el").remove();
        $("input[name=address_of_service_postal_code]").before("<span class='el el-remove'></span>");
        alert("Please fill up all necessary fields");
        return false;
      }else{
        $("input[name=address_of_service_postal_code]").find("span.el").remove();
        $("input[name=address_of_service_postal_code]").before("<span class='el el-ok'></span>");
      }
    }

    return valid;

  }
// }
/*********************************************************************************************************/



}



function validate_date(str) {
  var selectedText = str;
  var selectedDate = new Date(selectedText);
  var now = new Date();
  if (selectedDate < now) {
  //  alert("Date must be in the future");
   return false;
  }else{
  //  alert("Date is ok!");
   return true;
  }
 }

 function validate_postalCode(str3){
   var regEx3 = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
   return regEx3.test(str3);
 }

 function validate_time_of_service_hours(str4){
   var regEx4 = /^0[1-9]|1[0-2]$/;
   return regEx4.test(str4);
 }

 function validate_time_of_service_minutes(str5){
   var regEx5 = /^([0-5][0-9])$/;
   return regEx5.test(str5);
 }
