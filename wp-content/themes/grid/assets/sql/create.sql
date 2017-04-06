select * from `newsfeeds`
where `is_published` = 1 and `id` < 29030 and
		(exists (
				select * from `posts`
				where `newsfeeds`.`content_id` = `posts`.`id` and `newsfeeds`.`content_type` = 'Fisho\Models\Post' and
						(exists (
								select *, `locations`.*,  ASTEXT(`locations`.`location`) AS location from `locations`
								where `posts`.`location_id` = `locations`.`id` and `posts`.`location_type` = 'Fisho\Models\Location' and `id` in (32, 33)
								) or
								exists (
										select * from `states`
										where `posts`.`location_id` = `states`.`id` and `posts`.`location_type` = 'Fisho\Models\State' and `id` in (81, 82)
								)
								or
								exists (
										select * from `countries`
										where `posts`.`location_id` = `countries`.`id` and `posts`.`location_type` = 'Fisho\Models\Country' and `id` in (10)
								)
						)
				)

				or

				exists (
						select *, `catch_infos`.*,  ASTEXT(`catch_infos`.`coordinates`) AS coordinates from `catch_infos`
						where `newsfeeds`.`content_id` = `catch_infos`.`id` and `newsfeeds`.`content_type` = 'Fisho\Models\CatchInfo' and `id` in (32, 33)
				)
		)
order by `id` desc