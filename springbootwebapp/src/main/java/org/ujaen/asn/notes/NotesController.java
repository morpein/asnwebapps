package org.ujaen.asn.notes;

import java.net.InetAddress;
import java.net.UnknownHostException;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.persistence.Query;
import org.springframework.stereotype.Controller;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

/**
 *
 * @author jrbalsas   
 */
@Controller
@RequestMapping("/")
@Transactional
public class NotesController {

    private static final Logger logger = Logger.getLogger(NotesController.class.getName());

    @PersistenceContext
    EntityManager em;

    @ModelAttribute
    public void initViewModel( Model model) {
        String hostname, hostaddress;
        try {
            hostname=InetAddress.getLocalHost().getHostName();
            hostaddress=InetAddress.getLocalHost().getHostAddress();
        } catch (UnknownHostException ex) {            
            hostname="unknown";
            hostaddress="unknown";
        }
        model.addAttribute("hostName",hostname);
        model.addAttribute("hostAddress",hostaddress);
        model.addAttribute("note",new Note());
    }
    
    @GetMapping
    public String listNotes(Model model) {
        List<Note> lc = null;
        try {
            Query q = em.createQuery("Select n from Note n", Note.class);
            lc = q.getResultList();
        } catch (Exception ex) {
            logger.log(Level.SEVERE, ex.getMessage(), ex);
        }

        model.addAttribute("notes", lc);
        return "notes";
    }
    @GetMapping("/{id}")
    public String noteDetail(@PathVariable Integer id, Model model) {
        Note note = null;
        String qry="Select n from Note n where id="+id;
        try {
            
            Query q = em.createQuery(qry, Note.class);
            note = (Note)q.getSingleResult();
        } catch (Exception ex) {
            logger.log(Level.SEVERE, ex.getMessage(), ex);
        }

        model.addAttribute("note", note);
        return "note";
    }

    @PostMapping
    public String addNote(@ModelAttribute("note") Note n,  BindingResult result, Model model) {
        String query="INSERT INTO note (title,text,hidden) VALUES ('%s','%s',%s)";
        query=String.format(query,
                n.getTitle(),
                n.getText(),
                n.getHidden()); 
        try {
            
            Query q = em.createNativeQuery(query);
            q.executeUpdate();
        } catch (Exception ex) {
            logger.log(Level.SEVERE, ex.getMessage(), ex);
        }

        return "redirect:";
    }

}
