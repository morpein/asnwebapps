package org.ujaen.asn.notes;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

/**
 *
 * @author jrbalsas
 */
@Configuration
public class MyNotesWebMVCConfig implements WebMvcConfigurer {

    @Override
    public void addViewControllers(ViewControllerRegistry registry) {
//        //Define routes to simple views
//        registry.addViewController("/").setViewName("notes");  //e.g. /WEB-INF/jsp/notes.jsp
//        //registry.addViewController("/error/404.html").setViewName("error/404");
    }

}
